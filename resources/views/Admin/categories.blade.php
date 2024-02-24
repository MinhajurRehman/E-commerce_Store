@include('Admin.sidebar')
<style>

    .form-container {
        background-color: #fff;
        padding: 40px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .form-group {
        margin-bottom: 15px;
    }

    label {
        display: block;
        font-size: 18px;
        margin-bottom: 5px;
    }

    input {
        width: 100%;
        padding: 8px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    button {
        background-color: #4caf50;
        color: #fff;
        padding: 10px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
    }

    button:hover {
        background-color: #45a049;
    }
</style>
<div class="form-container">
    <form method="post" action="" enctype='multipart/form-data'>
        @csrf
        <div class="form-group">
            <label for="picture">Upload Picture:</label>
            <input type="file" id="picture" name="picture">
        </div>

        <div class="form-group">
            <label for="category">Category Name:</label>
            <input type="text" id="category" name="title">
        </div>

        <div class="form-group">
            <label for="quantity">Number of Products:</label>
            <input type="number" id="quantity" name="quantity">
        </div>

        <button type="submit">Submit</button>
    </form>
</div>

<script src="{{ url('assets/js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ url('assets/js/popper.min.js') }}"></script>
<script src="{{ url('assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ url('assets/plugins/scroll-fixed/jquery-scrolltofixed-min.js') }}"></script>
<script src="{{ url('assets/plugins/testimonial/js/owl.carousel.min.js') }}"></script>
<script src="{{ url('assets/js/script.js') }}"></script>



</html>
