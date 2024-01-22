"use strict";

let example_form = $("#example-form").DataTable({
    paging: true,
    pagingType: "first_last_numbers",
    pageLength: 10,
    ordering: false,
    info: true,
    scrollY: true,
    scrollX: true,
    columnDefs: [
        {
            orderable: false,
            className: "select-checkbox",
            checkboxes: {
                selectRow: true,
            },
            targets: 0,
        },
    ],
    select: {
        style: "os",
        selector: "td:first-child", // Corrected selector for the first cell in each row
    },
});

let cbx_select_all = $("#select-all");
cbx_select_all.change(function () {
    const $selectAllCheckbox = cbx_select_all;

    // Manually set the selected state for each row based on the condition
    example_form.rows().every(function () {
        const rowData = this.data();
        const checkboxState = rowData[0] && rowData[0].includes("enable");

        // if (checkboxState) {
        //     // $(this).select($selectAllCheckbox.prop("checked"));
        //     this.nodes()
        //         .to$()
        //         .find("input.row-checkbox.enable")
        //         .prop("checked", $selectAllCheckbox.prop("checked"));
        // }
        // Update the data property to indicate whether the row is selected
        this.data()[1] =
            checkboxState && $selectAllCheckbox.prop("checked")
                ? "checked"
                : "not-checked";

        this.nodes()
            .to$()
            .find("input.row-checkbox.enable")
            .prop("checked", $selectAllCheckbox.prop("checked"));
    });
});
example_form.on("change", "tbody input.row-checkbox.enable", function () {
    const $rowCheckbox = $(this);

    // Update the data property to indicate whether the row is selected
    const rowIndex = example_form.row($rowCheckbox.closest("tr")).index();
    const rowData = example_form.row(rowIndex).data();
    rowData[1] = $rowCheckbox.prop("checked") ? "checked" : "not-checked";

    // Update the DataTable's data with the modified row data
    // example_form.row(rowIndex).data(rowData);

    // Update the "Select All" checkbox state
    updateSelectAllCheckbox();
});

// Function to update the state of the "Select All" checkbox
function updateSelectAllCheckbox() {
    const $selectAllCheckbox = $("#select-all");
    const $rowCheckboxes = $("tbody input.row-checkbox.enable");

    const allChecked =
        $rowCheckboxes.length === $rowCheckboxes.filter(":checked").length;
    $selectAllCheckbox.prop("checked", allChecked);
}

// Event handler for form submission
// Event handler for form submission
$("#submit-form").on("click", function () {
    // Get the data of the DataTable
    const tableData = example_form.data().toArray();

    // Filter out only the selected rows
    const selectedRows = tableData.filter((row) => row[1] === "checked");

    // Call the function to submit the form asynchronously
    submitForm(selectedRows);
});
const url = "store";

const alertElement = document.createElement("div");
alertElement.setAttribute("class", "alert-dismissible");
alertElement.setAttribute("role", "alert");

const closeButton = document.createElement("button");
closeButton.setAttribute("type", "button");
closeButton.setAttribute("class", "btn-close");
closeButton.setAttribute("data-bs-dismiss", "alert");
closeButton.setAttribute("aria-label", "Close");

async function submitForm(dataArray) {
    try {
        function extractValueFromHTML(htmlString) {
            const parser = new DOMParser();
            const doc = parser.parseFromString(htmlString, "text/html");
            const inputElement = doc.querySelector("input");
            return inputElement ? inputElement.value : null;
        }
        // Iterate over the data and extract the values
        // const values = dataArray.map((row) => extractValueFromHTML(row[0]));
        const values = {
            submisiions: dataArray.map((row) => extractValueFromHTML(row[0])),
            date: $("#bs-datepicker-autoclose").val(),
        };
        const response = await axios.post(url, values);
        if (response.data.success) {
            // Redirect to the desired URL
            // const redirectUrl = response.data.redirectUrl;
            window.location.href = "../";
        } else {
            const errorMessage = response.data.error;
            alertElement.innerText = errorMessage;
            alertElement.classList.add("alert", "alert-danger");
            alertElement.appendChild(closeButton);
            alertarea.appendChild(alertElement);
        }

        // console.log("Submitted rows:", dataArray);
    } catch (error) {
        console.error("Error submitting form:", error);
        // Handle errors if needed
    }
}
