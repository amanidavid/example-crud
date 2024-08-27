<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Import Form</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: Arial, sans-serif;
        }

        .form-card {
            background: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
        }

        .form-card h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333333;
            font-weight: bold;
        }

        .form-card .btn-success {
            width: 100%;
            background-color: #28a745;
            border-color: #28a745;
        }

        .form-card .btn-success:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }

        .alert {
            margin-top: 20px;
            text-align: center;
        }

        @media (max-width: 576px) {
            .form-card {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="form-card">
        <h2>Import Excel File</h2>
        {{-- <form class="row g-3" wire:submit.prevent="import">
            <div class="mb-3">
                <label for="formFile" class="form-label">Choose Excel File</label>
                <input class="form-control" type="file" id="formFile" wire:model="file">
                @error('file') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <button type="submit" class="btn btn-success">Import</button>
        </form> --}}
        @if (session()->has('message'))
        <div class="alert alert-success mt-3">{{ session('message') }}</div>
        @endif

        @if (session()->has('error'))
        <div class="alert alert-danger mt-3">{{ session('error') }}</div>
        @endif

        @livewire('my-task-component')
    </div>

    <!-- Bootstrap 5 JS (optional for additional functionality) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
