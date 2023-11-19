<?php

class Faq extends DBConnection{

    function getServiceFaqs($serviceId, $quesArray, $ansArray){

        try {
            // Validate input arrays
            if (!is_array($quesArray) || !is_array($ansArray)) {
                throw new Exception("Input arrays must be valid arrays");
            }
    
            // Find the maximum length of the two arrays
            $count = max(count($quesArray), count($ansArray));
    
            for ($i = 0; $i < $count; $i++) {
                $question = isset($quesArray[$i]) ? $quesArray[$i] : '';
                $answer = isset($ansArray[$i]) ? $ansArray[$i] : '';
    
                // Validate question and answer
                if (!empty($question) || !empty($answer)) {
                    // echo "Question and answer cannot be empty! <br>";
                    $added = $this->addServiceFaq($serviceId, $question, $answer);
                    if (!$added) {
                        throw new Exception("Failed to add FAQ");
                    }
                }
            }
    
            return true;
        } catch (Exception $e) {
            echo "Error in getServiceFaqs: " . $e->getMessage();
            return false;
        }
    }
    



    function updateServiceFaqs($serviceId, $quesArray, $ansArray){

        try {
            // Validate input arrays
            if (!is_array($quesArray) || !is_array($ansArray)) {
                throw new Exception("Input arrays must be valid arrays");
            }
    
            // Find the maximum length of the two arrays
            $count = max(count($quesArray), count($ansArray));

            for ($i = 0; $i < $count; $i++) {
                $question = isset($quesArray[$i]) ? $quesArray[$i] : '';
                $answer = isset($ansArray[$i]) ? $ansArray[$i] : '';
    
                // Validate question and answer
                if (empty($question) || empty($answer)) {
                    echo "Question and answer cannot be empty! <br>";
                }
    
                $added = $this->addServiceFaq($serviceId, $question, $answer);
                if (!$added) {
                    throw new Exception("Failed to add FAQ");
                }
            }
    
            return true;
        } catch (Exception $e) {
            echo "Error in getServiceFaqs: " . $e->getMessage();
            return false;
        }
    }



    // id	service_id	page	question	answare	
    function addServiceFaq($serviceId, $question, $answer) {

        if (empty($question) && empty($answer)) {
            return false;
        }

        try {

            // Prepare the SQL statement
            $sql = "INSERT INTO faqs (service_id, question, answer) VALUES (?, ?, ?)";
            $stmt = $this->conn->prepare($sql);
    
            if (!$stmt) {
                throw new Exception("Error preparing statement: " . $this->conn->error);
            }
    
            // Bind parameters
            $stmt->bind_param("iss", $serviceId, $question, $answer);
    
            // Execute the statement
            if (!$stmt->execute()) {
                throw new Exception("Error executing statement: " . $stmt->error);
            }else {
                return true;
            }

        } catch (Exception $e) {
            // Handle the exception (log, display, etc.)
            echo "Error: " . $e->getMessage();
            return false;
        }
    }



    // Function to fetch FAQs by service_id
    function getFaqsByServiceId($serviceId) {
        // Prepare the SQL query
        $query = "SELECT * FROM faqs WHERE service_id = ?";

        // Use prepared statement to prevent SQL injection
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $serviceId);

        // Execute the query
        $stmt->execute();

        // Get the result set
        $result = $stmt->get_result();

        // Fetch data into an associative array
        $faqs = $result->fetch_all(MYSQLI_ASSOC);

        // Close the statement and connection
        $stmt->close();

        return $faqs;
    }



    // Function to delete FAQs by service_id
    function deleteFaqsByServiceId($serviceId) {
   
        // Prepare the SQL query
        $query = "DELETE FROM faqs WHERE service_id = ?";

        // Use prepared statement to prevent SQL injection
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $serviceId); // Assuming service_id is an integer, adjust if it's a different type

        // Execute the query
        $stmt->execute();

        // Check if any rows were affected
        $rowsAffected = $stmt->affected_rows;

        // Close the statement and connection
        $stmt->close();

        if($rowsAffected == 1){
            return true;
        }else {
            return false;
        }
    }

}



?>