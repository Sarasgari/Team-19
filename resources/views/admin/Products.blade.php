<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameDen Admin - Products</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            background-color: #f4f4f7;
            color: #333;
            margin-top: 60px;
        }


        .container-fluid {
            margin-left: 240px;
            padding: 25px;
            margin-top: 80px;
            position: relative;
            z-index: 1;
        }

        /* Product specific styles */
        .product-card {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            margin-bottom: 20px;
            padding: 15px;
            transition: transform 0.2s;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }

        .product-image {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 4px;
        }


        /* Modal styles */
        .modal-body input, 
        .modal-body textarea, 
        .modal-body select {
            margin-bottom: 15px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .navbar {
                width: 100%;
                height: auto;
                position: relative;
            }

            .header {
                left: 0;
                width: 100%;
            }

            .container-fluid {
                margin-left: 0;
                padding: 15px;
            }
        }
    </style>
</head>
<body>
@include('include.adminheader')

@include('include.adminbar')

    

    <!-- Main Content -->
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Products Management</h2>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProductModal">
                <i class="fas fa-plus"></i> Add New Product
            </button>
        </div>

        <!-- Products List -->
        <div class="row" id="productsList">
            <!-- Products will be dynamically added here -->
        </div>
    </div>

    <!-- Add/Edit Product Modal -->
    <div class="modal fade" id="addProductModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="addProductForm">
                        <input type="text" name="name" class="form-control" placeholder="Product Name" required>
                        <input type="number" name="price" class="form-control" placeholder="Price" step="0.01" required>
                        <input type="file" name="image" class="form-control" accept="image/*" required>
                        <textarea name="description" class="form-control" placeholder="Product Description" rows="3" required></textarea>
                        <select name="category" class="form-control" required>
                            <option value="">Select Category</option>
                            <option value="action">Action Games</option>
                            <option value="adventure">Adventure Games</option>
                            <option value="rpg">RPG Games</option>
                            <option value="sports">Sports Games</option>
                        </select>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" onclick="addProduct()">Add Product</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Sample products data
        let products = [
            {
                id: 1,
                name: "Game Title 1",
                price: 59.99,
                image: "path/to/image1.jpg",
                description: "Exciting game description",
                category: "action"
            }
        ];

        // Function to display products
        function displayProducts() {
            const productsList = document.getElementById('productsList');
            productsList.innerHTML = '';
            
            products.forEach(product => {
                productsList.innerHTML += `
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="product-card">
                            <div class="d-flex">
                                <img src="${product.image}" alt="${product.name}" class="product-image me-3">
                                <div>
                                    <h5>${product.name}</h5>
                                    <p class="text-primary">$${product.price}</p>
                                    <p class="small">${product.description}</p>
                                    <span class="badge bg-secondary">${product.category}</span>
                                </div>
                            </div>
                            <div class="mt-2 text-end">
                                <button class="btn btn-sm btn-warning" onclick="editProduct(${product.id})">
                                    <i class="fas fa-edit"></i> Edit
                                </button>
                                <button class="btn btn-sm btn-danger" onclick="deleteProduct(${product.id})">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </div>
                        </div>
                    </div>
                `;
            });
        }

        // Function to add new product
        function addProduct() {
            const form = document.getElementById('addProductForm');
            const formData = new FormData(form);
            
            const newProduct = {
                id: products.length + 1,
                name: formData.get('name'),
                price: parseFloat(formData.get('price')),
                description: formData.get('description'),
                category: formData.get('category'),
                image: URL.createObjectURL(formData.get('image'))
            };

            products.push(newProduct);
            displayProducts();
            
            // Close modal and reset form
            const modal = bootstrap.Modal.getInstance(document.getElementById('addProductModal'));
            modal.hide();
            form.reset();
        }

        // Function to edit product
        function editProduct(id) {
            const product = products.find(p => p.id === id);
            if (!product) return;

            const form = document.getElementById('addProductForm');
            form.querySelector('[name="name"]').value = product.name;
            form.querySelector('[name="price"]').value = product.price;
            form.querySelector('[name="description"]').value = product.description;
            form.querySelector('[name="category"]').value = product.category;

            document.querySelector('.modal-title').textContent = 'Edit Product';
            const submitButton = document.querySelector('.modal-footer .btn-primary');
            submitButton.textContent = 'Save Changes';
            submitButton.onclick = () => updateProduct(id);

            const modal = new bootstrap.Modal(document.getElementById('addProductModal'));
            modal.show();
        }

        // Function to update product
        function updateProduct(id) {
            const form = document.getElementById('addProductForm');
            const formData = new FormData(form);
            
            const productIndex = products.findIndex(p => p.id === id);
            if (productIndex === -1) return;

            products[productIndex] = {
                ...products[productIndex],
                name: formData.get('name'),
                price: parseFloat(formData.get('price')),
                description: formData.get('description'),
                category: formData.get('category')
            };

            if (formData.get('image').size > 0) {
                products[productIndex].image = URL.createObjectURL(formData.get('image'));
            }

            displayProducts();
            
            const modal = bootstrap.Modal.getInstance(document.getElementById('addProductModal'));
            modal.hide();
            form.reset();
            
            document.querySelector('.modal-title').textContent = 'Add New Product';
            const submitButton = document.querySelector('.modal-footer .btn-primary');
            submitButton.textContent = 'Add Product';
            submitButton.onclick = addProduct;
        }

        // Function to delete product
        function deleteProduct(id) {
            if(confirm('Are you sure you want to delete this product?')) {
                products = products.filter(product => product.id !== id);
                displayProducts();
            }
        }

        // Initial display of products
        displayProducts();
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
