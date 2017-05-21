<?php

$labels = getLabels();
?>
<p>
<table name="labels">

    <tr class="lviews">
        <td class="lview">Label Name</td>
    </tr>
    
    <?php
foreach ($labels as $label)
{
        ?>
    <tr class="lview">
        <td class="lview"><a href="index.php?action=label&cid=<?php echo $label['id']; ?>"><?php echo $label['name']; ?></a></td>
    </tr>
        <?php
}
    ?>
</table>
</p>