<?php    
$class='here1';  
$sms='Expenses list';  
include './templates/default/header.php';
include './templates/default/footer.php';
require_once '../Other/Permissions.php'; 
Permissions::checkPermissions(); 
if(!key_exists('filter', $_SESSION) || !$_SESSION['filter'] ){
   require '../Controllers/FormExpenses.php'; 
}else{
    $expenses = $_SESSION['expenses_result'];
    unset($_SESSION['expenses_result']);
    unset($_SESSION['filter']);
}
 require '../Other/Expenses.php'; 
?>
 <!-- datepicker resourcess -->
<link rel="stylesheet" type="text/css" media="all" href="../Other/datepicker/jsDatePick_rtl.min.css" />
<script type="text/javascript" src="../Other/datepicker/jsDatePick.min.1.3.js"></script>

<script type="text/javascript">
    window.onload = function(){
        new JsDatePick({
            useMode:2,
            target:"inputField",
            dateFormat:"%Y-%m-%d"
            /*selectedDate:{                This is an example of what the full configuration offers.
                day:5,                      For full documentation about these settings please see the full version of the code.
                month:9,
                year:2006
            },
            yearsRange:[1978,2020],
            limitToToday:false,
            cellColorScheme:"beige",
            dateFormat:"%m-%d-%Y",
            imgPath:"img/",
            weekStartDay:1*/
        });
    };
</script>
<form method="post" action="../Controllers/SortExpenses.php">    
<div class="table"><select name='groups' onchange="this.form.submit()">
        <option value="all">All</option>
        <?php foreach(Expenses::GetExpensesCategories() as $k=>$v):?>
            <?php if(key_exists('selected', $_SESSION) && ($_SESSION['selected'] == $v['id'])):  ?>
                    <option value="<?php echo $v['id'];  ?>" selected='selected'><?php echo $v['name']?></option>
                    <?php unset($_SESSION['selected']); ?>
            <?php else: ?>
                 <option value="<?php echo $v['id'];  ?>"><?php echo $v['name']?></option>
            <?php endif; ?>
        <?php endforeach; ?>
    </select>
    Date: <input name='date' type="text" id="inputField">
</form> 
<table border ="1">
    <tr>
        <td align="center" valign="middle">Name</td>
        <td align="center" valign="middle">Price </td>
        <td align="center" valign="middle">Category</td>
        <td align="center" valign="middle">Date</td>
    </tr>
<?php if(!empty($expenses)): ?>        
    <?php foreach($expenses as $k=>$v): ?>
        <tr>
            <td align="center" valign="middle"><?php echo $v['expenses_name'];?></td>
            <td align="center" valign="middle"><?php echo $v['expenses_price'];?></td>
            <td align="center" valign="middle"><?php echo $v['name']; ?></td>
            <td align="center" valign="middle"><?php echo $v['date']; ?></td>
        </tr>
    <?php endforeach; ?>
<?php endif;?>    
</table>
<?php unset($_SESSION['expenses']); ?>  
</div>