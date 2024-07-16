<?php
    var_dump($slots);
    var_dump($voitures);
?>

<table>
    <thead>
        <tr>
            <!-- La liste des slots -->
             <?php foreach($slots as $index => $slot) { ?>
                <th><?=$slot?></th>
             <?php } ?>
        </tr>
    </thead>
    <tbody>
    
        <tr>
            <!-- La liste des slots -->
            <?php foreach($voitures as $index => $voitures) { ?>
                <td><?=$slot?></td>
            <?php } ?>
        </tr>
    </tbody>
</table>