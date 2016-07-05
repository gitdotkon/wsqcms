<?php
/**
 * Table for Marine page
 * @var $table
 *
 */
if($table):
    ?>
    <table class="specs_table">
        <tbody>
        <?php foreach ($table as $row): ?>
            <tr>
                <?php for($i=1; $i<=5; $i++): ?>
                    <?php if($row['is_header']): ?>
                        <th><?php echo $row['column_'.$i]; ?></th>
                    <?php else: ?>
                        <?php if($i == 1): ?>
                            <td class="red_td">
                                <div class="red_td_div">
                                    <?php echo $row['column_'.$i]; ?>
                                </div>
                            </td>
                        <?php else: ?>
                            <td <?php if($row['is_wide_column']){echo 'colspan="2"'; $row['is_wide_column'] = false; $i++; } ?>><?php echo $row['column_'.($i)]; ?></td>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php endfor; ?>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php endif;
