<?php
$cid = filter_input(INPUT_GET,'cid',FILTER_SANITIZE_NUMBER_INT);

$label = getLabel($cid);
?>
<p>
<table name="labels">

    <tr>
        <td class="lviews">Label Name</td>
        <td class="lviews">Contact Name</td>
        <td class="lviews">Address</td>
        <td class="lviews">City</td>
        <td class="lviews">State</td>
        <td class="lviews">Zip Code</td>
    </tr>
    
    <?php
foreach ($label as $labelInfo)
{
        ?>
    <tr>
        <td class="lview"><?php echo $labelInfo['name']; ?></td>
        <td class="lview"><?php echo $labelInfo['contact']; ?></td>
        <td class="lview"><?php echo $labelInfo['saddress']; ?></td>
        <td class="lview"><?php echo $labelInfo['city']; ?></td>
        <td class="lview"><?php echo $labelInfo['state']; ?></td>
        <td class="lview"><?php echo $labelInfo['zip']; ?></td>
    </tr>
        <?php
}
    ?>
</table>
</p>