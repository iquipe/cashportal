<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 24/11/2018
 * Time: 11:33 AM
 */
?>
<div class="col-md-12">
    <div class="card  card-plain">
        <div class="card-header">
            <h4 class="card-title"> Table on Plain Background</h4>
            <p class="category"> Here is a subtitle for this table</p>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table tablesorter " id="">
                    <thead class=" text-primary">
                    <th>
                        Date
                    </th>
                    <th>
                        Detail
                    </th>
                    <th>
                        Transaction
                    </th>
                    <th>
                        Ref
                    </th>
                    <th class="text-center">
                        Debt
                    </th>
                    <th class="text-center">
                        Credit
                    </th>
                    </thead>
                    <tbody>
                        <?php user_transaction($conn,$userID);?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
