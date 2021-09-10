<style>
    table {
        border-collapse: collapse;
        border-spacing: 0;
        width: 100%;
        border: 1px solid #ddd;
    }

    th,
    td {
        text-align: left;
        padding: 8px;
    }

    /* tr:nth-child(even) {
        background-color: #f2f2f2
    } */
</style>
<div class="row">
    <div class="col-md-12">
        <div class="form-group row">
            <label for="tpa_company" class="col-form-label col-md-5 font-weight-bold">Email Section : </label>
            <div class="col-md-8">
            </div>
        </div>
    </div>
    <div class="col-md-12" style="overflow-x:auto;">
        <table class="table mb-0 table-bordered" id="first_table">
            <thead>
                <tr>
                    <th>Client Email</th>
                    <th>Date</th>
                    <th>Excel Attach (Only Excel File)</th>
                    <th>Company Email</th>
                    <th>Attach Quote(Only Excel & PDF File)</th>
                    <th>Attach Endorsment Copy(Only Excel & PDF File)</th>
                    <th>Gross Premium</th>
                    <th>Cgst </th>
                    <th>Sgst</th>
                    <th>Final Premium<input type="hidden" name="gmc_policy_id" id="gmc_policy_id" value=""></th>
                </tr>
            </thead>
            <tbody id="first_table_tbody">
       
            </tbody>
        </table>
    </div>

</div>
