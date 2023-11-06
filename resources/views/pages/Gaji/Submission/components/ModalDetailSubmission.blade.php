<table class="datatables-order table border-top dataTable no-footer dtr-column collapsed" id="example-form"
    aria-describedby="DataTables_Table_0_info" data-page-length='25'>
    <thead>
        <tr>
            <th class="select-checkbox" rowspan="1" colspan="1" style="width: 2px" aria-label="">
                No</th>
            <th class="sorting_disabled" rowspan="1" colspan="1" data-col="1" aria-label="" style="width: 2px">
                <input type="checkbox" class="select-all">
            </th>
            {{-- other th --}}
        </tr>
    </thead>
    <tbody>
        @for ($i = 0; $i < 100; $i++)
            <tr>
                <td class="control"></td>
                <td class=" dt-checkboxes-cell"><input type="checkbox"
                        class="dt-checkboxes form-check-input row-checkbox"></td>
                {{-- other td --}}
            </tr>
        @endfor



    </tbody>
</table>
