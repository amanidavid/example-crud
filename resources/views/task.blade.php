<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap 4 Modal Example</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    
<style>
    /* Basic styling for the modal */
    .form-control {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .btn-secondary {
        background-color: #6c757d;
        border-color: #6c757d;
        padding: 10px 20px;
        border-radius: 5px;
        color: white;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        padding: 10px 20px;
        border-radius: 5px;
        color: white;
    }

    .btn-primary:hover, .btn-secondary:hover {
        opacity: 0.9;
    }
</style>
</head>
<body>

<div class="container mt-5">
    <!-- Button trigger modal -->
    <!-- Edit Button -->
<button type="button" class="btn btn-custon-four btn-success" onclick="showModal()">Edit</button>

<!-- Modal -->
<div id="editModal" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.5); justify-content:center; align-items:center; z-index:1000;">
    <div style="background:white; padding:30px; border-radius:10px; width:400px; box-shadow: 0 5px 15px rgba(0,0,0,.5);">
        <h4 style="text-align:center; margin-bottom:20px;">Edit Task</h4>
        
        <form id="editForm">
            <div class="form-group">
                <label for="input1">Input 1</label>
                <input type="text" class="form-control" id="input1" placeholder="Enter first input">
            </div>
            <div class="form-group">
                <label for="input2">Input 2</label>
                <input type="text" class="form-control" id="input2" placeholder="Enter second input">
            </div>
            <div class="form-group">
                <label for="input3">Input 3</label>
                <input type="text" class="form-control" id="input3" placeholder="Enter third input">
            </div>
            <div class="form-group">
                <label for="input4">Input 4</label>
                <input type="text" class="form-control" id="input4" placeholder="Enter fourth input">
            </div>
            <div class="form-group">
                <label for="input5">Input 5</label>
                <input type="text" class="form-control" id="input5" placeholder="Enter fifth input">
            </div>

            <div style="text-align:center; margin-top:20px;">
                <button type="button" class="btn btn-secondary" onclick="hideModal()">Cancel</button>
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
        </form>
    </div>
</div>

<script>
    function showModal() {
        document.getElementById('editModal').style.display = 'flex';
    }

    function hideModal() {
        document.getElementById('editModal').style.display = 'none';
    }

    document.getElementById('editForm').addEventListener('submit', function(event) {
        event.preventDefault();
        // Add your form submission logic here

        hideModal(); // Hide modal after form submission
    });
</script>


</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
