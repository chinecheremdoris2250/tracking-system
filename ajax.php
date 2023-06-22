
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Get the modal
        var modal = document.getElementById('viewModal');
        
        // Get the button that opens the modal
        var buttons = document.getElementsByClassName('view-btn');
        
        // Get the student details container
        var studentDetails = document.getElementById('studentDetails');
        
        // Iterate over each button and add a click event listener
        Array.from(buttons).forEach(function(button) {
            button.addEventListener('click', function() {
                var studentId = this.getAttribute('data-id');
                
                // Use AJAX to fetch the student details and update the modal body
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            studentDetails.innerHTML = xhr.responseText;
                        } else {
                            studentDetails.innerHTML = 'Error loading student details.';
                        }
                    }
                };
                xhr.open('GET', 'v.php?id=' + studentId, true);
                xhr.send();
            });
        });
    });
</script>
