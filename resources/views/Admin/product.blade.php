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

    input,textarea {
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
            <input type="file" id="img" name="img">
        </div>

        <div class="form-group">
            <label for="productName">Product Name:</label>
            <input type="text" id="productName" name="productName">
        </div>

        <div class="form-group">
            <label for="productPrice">Product Price:</label>
            <input type="number" id="productPrice" name="productPrice">
        </div>

        <div class="form-group">
            <label for="cutPrice">Cut Price:</label>
            <input type="number" id="cutPrice" name="cutPrice">
        </div>

        <div class="form-group">
            <label for="smallDescription">Product Small Description:</label>
            <textarea id="smallDescription" name="smallDescription" rows="3"></textarea>
        </div>

        <div class="form-group">
            <label for="mainDescription">Main Description:</label>
            <textarea id="mainDescription" name="mainDescription" rows="5"></textarea>
        </div>

        <div class="form-group">
            <label for="productInfo">Product Information:</label>
            <textarea id="productInfo" name="productInfo" rows="5"></textarea>
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
