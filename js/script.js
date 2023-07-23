function ValidateEmail(mail) {
//  if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(myForm.emailAddr.value)){
 if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail)){
    
    return (true)
  }
    alert("You have entered an invalid email address!")
    return (false)
}


const subscribeMail = () => {

    let subscriber = document.getElementById("main-subscribe").value;

    if (subscriber !== '') {
        
        if (ValidateEmail(subscriber) == true) {
            $.ajax({
                url: "ajax/mail-subscribe.ajax.php",
                type: "POST",
                data: {
                    subscriber: subscriber
                },
                success: function(response) {
                    if (response.trim().includes("Thank You!")) {

                        // Swal.fire({
                        //     position: 'top-end',
                        //     icon: 'success',
                        //     title: 'Thanks for subscribe us!',
                        //     showConfirmButton: false,
                        //     timer: 1500
                        // })
                        alert("Thanks for subscribe us");
                    }
                }
            });
        }

    }else{
        // Swal.fire({
        //     position: 'top-end',
        //     icon: 'error',
        //     title: 'Please enter your email!!',
        //     showConfirmButton: false,
        //     timer: 1500
        // })
        alert("Please enter your email!");
    }
    //   return false;

}