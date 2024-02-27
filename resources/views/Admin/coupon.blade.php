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

    input,select {
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
    <label for="name">Coupon Name:</label>
    <input type="text" id="name" name="coupon_name" placeholder="Coupon Name"><br><br>

    <label for="name">Description</label>
    <input type="text" id="desc" name="desc" placeholder="Description..."><br><br>

    <label for="name">Maximum Uses</label>
    <input type="text" id="max_uses" name="max_uses" placeholder="max uses"><br><br>

    <label for="name">Maximum Uses Users</label>
    <input type="text" id="max_uses_users" name="max_uses_users" placeholder="max uses users"><br><br>

    <label for="cars">Choose a Discount Type</label>
    <select name="type" id="type" form="type">
    <option value="percent">percent</option>
    <option value="fixed">fixed</option>
    </select>

    <label for="name">Discount ammount</label>
    <input type="text" id="discount_ammount" name="discount_ammount" placeholder="discount ammount"><br><br>

    <label for="name">Minimum ammount</label>
    <input type="text" id="min_ammount" name="min_ammount" placeholder="min ammount"><br><br>

    <label for="cars">Status On/Off</label>
    <select name="status" id="status" form="status">
    <option value="0">1</option>
    <option value="1">0</option>
    </select>

    <label for="name">Start date</label>
    <input type="datetime-local" id="starts_at" name="starts_at"><br>
    <span style="color: red">notice*start date must be greater than current date</span><br>


    <label for="name">Expire Date</label>
    <input type="datetime-local" id="expires_at" name="expires_at"><br>
    <span style="color: red">notice*expires date must be greater than start date</span><br>

    <label for="random">Random Alphanumeric:</label>
    <input type="text" id="random" name="code" readonly><br>
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
