<?php

class UtilityImage{

    function imageCompress($source, $destination, $reducePercentage){

        $info = getimagesize($source);

        if ($info['mime'] == 'image/jpeg') 
            $image = imagecreatefromjpeg($source);

        elseif ($info['mime'] == 'image/gif') 
            $image = imagecreatefromgif($source);

        elseif ($info['mime'] == 'image/png') 
            $image = imagecreatefrompng($source);

        imagejpeg($image, $destination, $reducePercentage);

        return $destination;
    }


    /** @var array */
    private $imageFormat = [
        'gif',
        'jpeg',
        'jpg',
        'png',
        'webp',
    ];

    /** @var array */
    private $constImageFormat = [
        IMAGETYPE_GIF => 'gif',
        IMAGETYPE_JPEG => 'jpeg',
        IMAGETYPE_PNG => 'png',
        IMAGETYPE_WEBP => 'webp',
    ];

    /**
     * Do image conversion work
     *
     * @param string $from
     * @param string $to
     *
     * @return resource
     * @throws \InvalidArgumentException
     */
    public function convert($from, $to, $quality = null)
    {
        $image = $this->loadImage($from);
        if (!$image) {
            throw new \InvalidArgumentException(sprintf('Cannot load image from %s', $from));
        }

        return $this->saveImage($to, $image, $quality);
    }

    private function loadImage($from)
    {
        $extension = $this->getRealExtension($from);

        if (!array_key_exists($extension, $this->constImageFormat)) {
            throw new \InvalidArgumentException(sprintf('The %s extension is unsupported', $extension));
        }

        $format = $this->constImageFormat[$extension];

        switch ($format) {
            case 'gif':
                $image = imagecreatefromgif($from);
                break;
            case 'jpg':
            case 'jpeg':
                $image = imagecreatefromjpeg($from);
                break;
            case 'png':
                $image = imagecreatefrompng($from);
                break;
            case 'webp':
                $image = imagecreatefromwebp($from);
                break;
            default:
                $image = null;
        }
        return $image;
    }

    private function saveImage($to, $image, $quality)
    {
        $extension = $this->getExtension($to);

        if ($extension === 'jpg') {
            $extension = 'jpeg';
        }

        if (!in_array($extension, $this->imageFormat)) {
            throw new \InvalidArgumentException(sprintf('The %s extension is unsupported', $extension));
        }
        if (!file_exists(dirname($to))) {
            $this->makeDirectory($to);
        }


        if(isset($quality) && !is_int($quality)) {
          throw new \InvalidArgumentException(sprintf('The %s quality has to be an integer', $quality));
        }

        switch ($extension) {
          case 'gif':
              $image = imagegif($image, $to);
              break;
          case 'jpg':
          case 'jpeg':
              if ($quality < -1 && $quality > 100) {
                  throw new \InvalidArgumentException(sprintf('The %s quality is out of range', $quality));
              }
              $image = imagejpeg($image, $to, $quality);
              break;          
          case 'png':
              if ($quality < -1 && $quality > 9) {
                  throw new \InvalidArgumentException(sprintf('The %s quality is out of range', $quality));
              }
              $image = imagepng($image, $to, $quality);
              break;
          case 'webp':
              if ($quality < 0 || $quality > 100) {
                  throw new \InvalidArgumentException(sprintf('The %s quality is out of range', $quality));
              }
              $image = imagewebp($image, $to, $quality);
              break;
          default:
              $image = null;
        }

        return $image;
    }

    /**
     * Given specific $path to detect current image extension
     */
    private function getRealExtension($path)
    {
        $extension = exif_imagetype($path);

        if (!array_key_exists($extension, $this->constImageFormat)) {
            throw new \InvalidArgumentException(sprintf('Cannot detect %s extension', $path));
        }

        return $extension;
    }

    /**
     * Get image extension from specific $path
     *
     * @param string $path
     *
     * @return string
     */
    private function getExtension($path)
    {
        $pathInfo = pathinfo($path);

        if (!array_key_exists('extension', $pathInfo)) {
            throw new \InvalidArgumentException(sprintf('Cannot find extension from %s', $path));
        }

        return $pathInfo['extension'];
    }

    /**
     * Get image extension from specific $path
     *
     * @param string $path
     *
     * @return string
     */
    private function setWebpExtension(){

        return 'webp';
    }

    /**
     * Try creating the directory
     *
     * @return bool
     * @throws \InvalidArgumentException
     */
    private function makeDirectory($to)
    {
        $result = @mkdir(dirname($to), 0755);

        if (!$result) {
            throw new \InvalidArgumentException(\sprintf('Cannot create %s directory', $to));
        }

        return $result;
    }


    function uploadImage($file, $targetDirectory) {
        // Check if file was uploaded without errors
        if ($file['error'] !== UPLOAD_ERR_OK) {
            switch ($file['error']) {
                case UPLOAD_ERR_INI_SIZE:
                    return json_encode(['status'=> false, 'msg'=> "The uploaded file exceeds the upload_max_filesize directive in php.ini."]);
                case UPLOAD_ERR_FORM_SIZE:
                    return json_encode(['status'=> false, 'msg'=> "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form."]);
                case UPLOAD_ERR_PARTIAL:
                    return json_encode(['status'=> false, 'msg'=> "The uploaded file was only partially uploaded."]);
                case UPLOAD_ERR_NO_FILE:
                    return json_encode(['status'=> false, 'msg'=> "No file was uploaded."]);
                case UPLOAD_ERR_NO_TMP_DIR:
                    return json_encode(['status'=> false, 'msg'=> "Missing a temporary folder."]);
                case UPLOAD_ERR_CANT_WRITE:
                    return json_encode(['status'=> false, 'msg'=> "Failed to write file to disk."]);
                case UPLOAD_ERR_EXTENSION:
                    return json_encode(['status'=> false, 'msg'=> "A PHP extension stopped the file upload."]);
                default:
                    return json_encode(['status'=> false, 'msg'=> "Unknown error occurred."]);
            }
        }
    
        // Check if the target directory exists, if not, create it
        if (!is_dir($targetDirectory)) {
            if (!mkdir($targetDirectory, 777, true)) {
                return "Failed to create target directory.";
            }
        }
    
        // Generate a unique file name to avoid overwriting existing files
        $fileName = uniqid() . '_' . basename($file['name']);
        $targetFilePath = $targetDirectory . $fileName;
    
        // Check if file already exists
        if (file_exists($targetFilePath)) {
            return "File already exists.";
        }
    
        // Try to move the uploaded file to the target directory
        if (!move_uploaded_file($file['tmp_name'], $targetFilePath)) {
            return "Error occurred while moving the uploaded file.";
        }
    
        // Return true if the upload was successful
        return json_encode(['status'=> true, 'msg' => 'success', 'filename' => $fileName]);
    }
    
}
?>