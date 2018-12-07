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
                    <th>Created Date</th>
                    <th>Name</th>
                    <th>Mobile</th>
                    <th>Country</th>
                    <th>Account</th>

                    </thead>
                    <tbody>
                    <?php user_ledger_summary($conn);?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>