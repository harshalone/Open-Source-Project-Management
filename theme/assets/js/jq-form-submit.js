(function($, window, document) {
      var options = { 
        target:        '#responce',   // target element(s) to be updated with server response 
        beforeSubmit:  showRequest,  // pre-submit callback 
        success:       showResponse  // post-submit callback 
 
        // other available options: 
        //url:       url         // override for form's 'action' attribute 
        //type:      type        // 'get' or 'post', override for form's 'method' attribute 
        //dataType:  null        // 'xml', 'script', or 'json' (expected server response type) 
        //clearForm: true        // clear all form fields after successful submit 
        //resetForm: true        // reset the form after successful submit 
 
        // $.ajax options can be used here too, for example: 
        //timeout:   3000 
    }; 
 
    // bind form using 'ajaxForm' 
    $('.ajaxform').ajaxForm(options); 

  }(window.jQuery, window, document));
 
// pre-submit callback 
function showRequest(formData, jqForm, options) {   
    //$('#responce').html('About to submit: \n\n' + queryString);  
    return true; 
} 
 
// post-submit callback 
function showResponse(responseText, statusText, xhr, $form)  {   
    
 if(responseText.status==false){ 
   $('#responce').show().html(responseText.error_msg); 
 }
 else{ 
   location.reload();
   $('#responce').show().html(responseText.success); 
 } 
    
} 