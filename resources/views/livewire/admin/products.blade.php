<div class="main-container">

    <style>
   .main-container {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    padding: 30px;
    box-sizing: border-box;
}

.product-form {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: flex-start; /* Align items to the left for better horizontal utilization */
    width: 100%; /* Ensure it takes the full width of its container */
    max-width: 900px; /* Significantly increased maximum width for horizontal expansion */
    margin-bottom: 30px;
    padding: 30px;
    border: 1px solid #ccc;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.08);
    box-sizing: border-box;
}

.product-form label {
    display: block;
    width: 100%;
    margin-bottom: 8px;
    font-size: 1.1rem;
    color: #444;
    text-align: left;
}

.product-form select,
.product-form input[type="text"],
.product-form input[type="number"],
.product-form input[type="file"] {
    padding: 12px;
    margin-bottom: 20px;
    border: 1px solid #bbb;
    border-radius: 6px;
    width: calc(100% - 0px); /* Ensure inputs take full available width */
    box-sizing: border-box;
    font-size: 1rem;
    color: #333;
}

.product-form select option {
    font-size: 1rem;
    color: #333;
}

.product-form .form-row {
    display: flex; /* Enable horizontal layout for specific rows if needed */
    gap: 20px; /* Space between elements in the row */
    width: 100%;
    margin-bottom: 20px;
    align-items: center; /* Align items vertically within the row */
}

.product-form .form-row label {
    width: auto; /* Adjust label width in a row */
    flex-shrink: 0; /* Prevent label from shrinking */
}

.product-form .form-row input[type="file"] {
    flex-grow: 1; /* Allow the input to take remaining space */
}

.product-form button {
    background-color: #007bff;
    color: #ffffff;
    padding: 15px 30px; /* Slightly wider button */
    border: none;
    border-radius: 6px;
    cursor: pointer;
    font-size: 1.2rem;
    align-self: center;
    transition: background-color 0.2s ease-in-out;
    min-width: 150px; /* Ensure a minimum button width */
}

.product-form button:hover {
    background-color: #0056b3;
}

.product-form p {
    color: red;
    margin-top: 15px;
    font-size: 0.9rem;
    text-align: center;
}

.table {
    border-collapse: collapse;
    width: 100%;
    max-width: 1200px; /* Increased maximum table width */
    margin: 0 auto 30px auto;
    font-size: 1rem;
    color: #333;
    border: 1px solid #ccc;
    border-radius: 10px;
    overflow-x: auto; /* Enable horizontal scrolling for very wide tables */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.08);
}

.table td,
.table th {
    border: none;
    padding: 15px 12px;
    text-align: left;
    white-space: nowrap; /* Prevent text wrapping in table cells */
}

.table th {
    background-color: #f8f9fa;
    color: #555;
    font-weight: bold;
    border-bottom: 1px solid #ddd;
    font-size: 1.1rem;
}

.table tbody tr:nth-child(even) {
    background-color: #f2f2f2;
}

.table tbody tr:hover {
    background-color: #e9ecef;
    transition: background-color 0.15s ease-in-out;
}

.table tbody td img {
    width: 70px; /* Slightly wider image */
    height: auto;
    border-radius: 6px;
    vertical-align: middle;
}

.table tbody td button {
    background-color: transparent;
    color: #007bff;
    border: 1px solid #007bff;
    padding: 8px 12px;
    border-radius: 6px;
    cursor: pointer;
    font-size: 0.9rem;
    transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out;
    margin-right: 8px;
}

.table tbody td button:hover {
    background-color: #007bff;
    color: white;
}

.table tbody td button:last-child {
    background-color: transparent;
    color: #dc3545;
    border-color: #dc3545;
}

.table tbody td button:last-child:hover {
    background-color: #dc3545;
    color: white;
}

.text-green-500 {
    color: #28a745;
    font-size: 1.3rem;
}

.font-bold {
    font-weight: 700;
}
    </style>



   <h4 class="text-blue-900 font-verdana text-2xl">Dashboard</h4>

   <div class="product-form drop-shadow-2xl rounded-lg border border-gray-300">

   <form wire:submit.prevent="saveproduct">

  
    <label for="">Professor</label>
    <select name="" id=""wire:model.live='supplierID'><br><br>
    <option value="">Select Professor</option>
    @foreach($suppliers as $supplier)
    <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
    @endforeach
    </select>
    @error('supplierID')
    <p style="font-size: 14px color:red;">{{ $message }}</p>
    @enderror


    <label for="">Student Name</label>
    <input type="text" wire:model.live="name">
   

    <label for="">School Year</label>
    <input type="number" step="any" wire:model.live="price">
   

    <label for="">Course</label>
    <input type="text" wire:model.live="category">
    

    <label for="">Age</label>
    <input type="number" wire:model.live="quantity">

<div class="form-row">
    <label for="">Student Photo</label>
    <input type="file" wire:model.live="productImage">
</div><br>

    <button wire:click="saveproduct">Save</button>

    <p>{{ $statusMessage }}</p>

    </form>


<table>
<thread>
    <th>Id No. /</th>
    <th>Student / Image /</th>
    <th>Professor /</th>
    <th>Student Name /</th>
    <th>School Year /</th>
    <th>Course /</th>
    <th>Age /</th>
    <th>Actions</th>
</thread>
    <tbody>

        @foreach ($products as $product)
        <tr>
            <td>
                {{ $product ->id }}
            </td>
            <td>
                <img src="{{ asset('uploads/product-images/'. $product->file_path) }}" style="width:50px">
            </td>
            <td>
                {{ $product ->supplier_name  }}
            </td>
            <td>
                {{ $product ->name  }}
            </td>
            <td>
                {{  $product ->price }}
            </td>
            <td>
                {{ $product ->category  }}
            </td>
            <td>
                {{ $product ->quantity  }}
            </td>
            <td>
                <button wire:click='toggleEditProduct({{ $product ->id }})'>Edit</button>
                <button wire:click='DeleteProduct({{ $product ->id }})'>Delete</button>
            </td>
        </tr>
        @endforeach
        
    </tbody>
</table>








   </div>
</div>
