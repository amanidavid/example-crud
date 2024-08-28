<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
    <style>
        .modal {
            transition: opacity 0.3s ease, visibility 0.3s ease;
        }
        .modal-overlay {
            background: rgba(0, 0, 0, 0.5);
        }
        .modal-content {
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 70%; /* Increase width here */
            max-width: 500px; /* Set a maximum width */
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>
<body class="bg-gray-200 flex items-center justify-center h-screen">

   @livewire('admin-component')

    <script>
        function toggleModal() {
            const modal = document.getElementById('userModal');
            if (modal.classList.contains('opacity-100')) {
                modal.classList.remove('opacity-100', 'visible');
                modal.classList.add('opacity-0', 'invisible');
            } else {
                modal.classList.remove('opacity-0', 'invisible');
                modal.classList.add('opacity-100', 'visible');
            }
        }

      
    </script>
    <script>
         function dismissMessage() {
        const messageElement = document.getElementById('error-message');
            if (messageElement) {
                messageElement.style.display = 'none';
            }
        }
    </script>
 

</body>
</html>
