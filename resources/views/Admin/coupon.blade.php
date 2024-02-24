@include('Admin.sidebar')

<style>
    /* Styling for the table */
    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }
    th, td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }
    th {
        background-color: #f2f2f2;
    }
    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    /* Styling for the form */
    form {
        background-color: #fff;
        padding: 40px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    form {
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
        cursor: pointer;
        font-size: 16px;
    }

    button:hover {
        background-color: #45a049;
    }

    .scroll {
        overflow-y: auto;
        margin-top: 20px;
        padding: 10px;
        background-color: #eee;
    }

</style>
<div class="scroll">
<h2>Coupon Form</h2>
<form method="post">
    @csrf
    <label for="name">Name:</label>
    <input type="text" id="name" name="cname"><br><br>

    <label for="random">Random Alphanumeric:</label>
    <input type="text" id="random" name="couponnumber" readonly><br>
    <br>
    <button type="button" onclick="generateRandom()">Generate</button><br><br>

    <button type="submit">Submit</button>
</form>

<script>
function generateRandom() {
    var randomString = Math.random(45).toString(36).substring(7);
    document.getElementById('random').value = randomString;
}
</script>

<h2>Coupon Lists</h2>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Coupon Name</th>
                <th>Coupon Number (generated)</th>
            </tr>
        </thead>
        <tbody>
            @foreach($coupon as $con)
            <tr>
                <td>{{ $con->id }}</td>
                <td>{{ $con->cname }}</td>
                <td>{{ $con->couponnumber }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script src="{{ url('assets/js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ url('assets/js/popper.min.js') }}"></script>
<script src="{{ url('assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ url('assets/plugins/scroll-fixed/jquery-scrolltofixed-min.js') }}"></script>
<script src="{{ url('assets/plugins/testimonial/js/owl.carousel.min.js') }}"></script>
<script src="{{ url('assets/js/script.js') }}"></script>



</html>
