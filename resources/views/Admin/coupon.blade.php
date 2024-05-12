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
    <input type="text" id="name" name="name" placeholder="Enter Coupon Name"><br><br>

    <label for="name">Coupon Code Custom:</label>
    <input type="text" id="code" name="code" placeholder="Enter Coupon Code custom"><br><br>

    <label for="name">Coupon Code Value:</label>
    <input type="number" id="value" name="value" placeholder="Enter Coupon Code value"><br><br>

    <label for="name">Coupon Code Type:</label>
    <select name="type" id="type">
        <option value="Per">Per</option>
        <option value="Value">Value</option>
      </select>

      <label for="name">Coupon Min Ammount:</label>
      <input type="number" id="min_ammount" name="min_ammount" placeholder="Enter Coupon Min Ammount"><br><br>

      <label for="name">Coupon One time:</label>
      <input type="number" id="one_time" name="one_time" placeholder="Enter Coupon Use how many times"><br><br>

      <label for="name">Coupon Code Status:</label>
      <select name="status" id="status">
          <option value="1">1</option>
          <option value="0">0</option>
        </select>


    <label for="name">Coupon Start Date:</label>
    <input type="datetime-local" id="start" name="startsAt"><br><br>

    <label for="name">Coupon Expiry Date:</label>
    <input type="datetime-local" id="expire" name="expiresAt"><br><br>

    <button type="submit">Submit</button>
</form>





<h2>Coupon Lists</h2>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Coupon Name</th>
                <th>Coupon Code </th>
                <th>Coupon Start Date </th>
                <th>Coupon Expire Date </th>
                <th>Actions </th>
            </tr>
        </thead>
        <tbody>
            @foreach($coupons as $con)
            <tr>
                <td>{{ $con->id }} </td>
                <td>{{ $con->name }} </td>
                <td>{{ $con->code }} </td>
                <td>{{ $con->startsAt }} </td>
                <td>{{ $con->expiresAt }} </td>
                <td><a href=""><i class="bi bi-trash">Delete</i></a></td>
                <style>
                    i{
                        color:red;
                    }
                </style>
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
