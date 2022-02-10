<?php
echo "<pre>";
$a = json_decode(file_get_contents("https://data.gov.lv/dati/lv/api/3/action/datastore_search?q=&resource_id=d499d2f0-b1ea-4ba2-9600-2c701b03bd4a&"));
$data = [];

foreach ($a as $one) {
        $data[] = $one->records;
}
?>

<!--Calendar-->
<form method="get" action="/">
<label for="start">Start date:</label>

<input type="date" id="start" name="date-start"
       value=""
       min="2020-02-29" max="2020-06-07">

<label for="end">End date:</label>

<input type="date" id="end" name="date-end"
       value=""
       min="2020-02-29" max="2020-06-07">

    <button type="submit">Filter</button>
</form>

<?php
$keyA = $_GET['date-start'];
$keyB = $_GET['date-end'];

?>
<!--Table-->
<table border="1|0">
    <thead>
        <th>
            Date
        </th>
        <th>
            Test Count
        </th>
        <th>
            Positive
        </th>
    </thead>
    <?php foreach ($data[2] as $o)
        if ($o->Datums > $keyA && $o->Datums < $keyB) {?>
    <tr>
        <td>
            <?php echo substr($o->Datums, 0, strpos($o->Datums, "T"));  ?>
        </td>
        <td>
            <?php echo $o->TestuSkaits;  ?>
        </td>
        <td>
            <?php echo $o->ApstiprinataCOVID19InfekcijaSkaits;  ?>
        </td>
    </tr>
    <?php } ?>
</table>




