@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">New test</h5>
                <div class="card-body">
                    <form>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Test name</label>
                            <input type="text" class="form-control" name="experiment-name">
                        </div>
                        <div class="form-group mb-3">
                            <label for="exampleInputEmail1" class="form-label">Experiment type</label>
                            <select class="form-select mr-sm-2" id="inlineFormCustomSelect">
                                <option selected>Choose...</option>
                                <option value="1">CTA Button Color</option>
                                <option value="2">Show Social Logins </option>
                                <option value="3">Brand Text</option>
                            </select>
                        </div>
                    </form>
                    <!-- <div class="mb-5">
                                        <label for="exampleInputPassword1" class="form-label">UUID</label>
                                        <input type="text" class="form-control" name="experiment_uuid">
                                    </div> -->
                    </form>
                </div>
                <h5 class=" card-title fw-semibold mb-4">Variants</h5>
                <div class="card-body">
                    <form>

                        <div class="row variant-row">
                            <div class="col-md-6">
                                <label class="form-label">Variant name </label>
                                <div class="mb-3">
                                    <input type="text" class="form-control" placeholder="A">
                                </div>
                            </div>
                            <div class="col-md-4 ms-auto">
                                <label class="form-label">Targeting ratio</label>
                                <div class="input-group mb-3">

                                    <input type="number" class="form-control" value="1" aria-label="" aria-describedby="basic-addon1">
                                    <button class="btn bg-danger-subtle text-danger" role="button" type="button">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-trash">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M4 7l16 0" />
                                            <path d="M10 11l0 6" />
                                            <path d="M14 11l0 6" />
                                            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="row variant-row">
                            <div class="col-md-6">
                                <label class="form-label">Variant name </label>
                                <div class="mb-3">
                                    <input type="text" class="form-control" placeholder="B">
                                </div>
                            </div>
                            <div class="col-md-4 ms-auto">
                                <label class="form-label">Targeting ratio</label>
                                <div class="input-group mb-3">

                                    <input type="number" class="form-control" value="1" aria-label="" aria-describedby="basic-addon1">
                                    <button class="btn bg-danger-subtle text-danger" type="button">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-trash">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M4 7l16 0" />
                                            <path d="M10 11l0 6" />
                                            <path d="M14 11l0 6" />
                                            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="additional-branch-button-container">
                            <p id="add-branch-link" class="text-primary">+ Add another branch</p>
                        </div>
                        <div class="d-flex justify-content-end mt-5">
                            <button type="submit" class="btn btn-success">Create Test</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        // Counter for assigning unique IDs to new branch elements
        var branchCounter = 1;

        // Function to create a new branch field set
        function createNewBranchField() {
            // Create a new row div
            var newRow = $('<div class="row variant-row"></div>');

            var variantCount = $('.form-label:contains("Variant name")').length;

            // Convert count to alphabet letter + 1
            var nextVariantLetter = String.fromCharCode('A'.charCodeAt(0) + variantCount);

            // Create branch name input
            var branchNameDiv = $('<div class="col-md-6"></div>').append(
                '<label class="form-label">Variant name</label>',
                '<div class="mb-3"><input type="text" class="form-control" placeholder="' + nextVariantLetter + '"></div>'
            );

            // Create branch split input
            var branchSplitDiv = $('<div class="col-md-4 ms-auto"></div>').append(
                '<label class="form-label">Targeting ratio</label>',
                '<div class="input-group mb-3">' +
                '<input type="number" class="form-control" placeholder="1" aria-label="" aria-describedby="basic-addon1">' +
                '<button class="btn bg-danger-subtle text-danger" type="button">' +
                '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-trash">' +
                '<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>' +
                '<path d="M4 7l16 0"></path>' +
                '<path d="M10 11l0 6"></path>' +
                '<path d="M14 11l0 6"></path>' +
                '<path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>' +
                '<path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>' +
                '</svg>' +
                '</button>' +
                '</div>'
            );

            // Append name and split divs to the row
            newRow.append(branchNameDiv, branchSplitDiv);

            // Append the new row to the container
            $('#additional-branch-button-container').before(newRow);
        }

        // Event listener for the add branch link
        $('#add-branch-link').on('click', function() {
            // Create a new branch field set
            console.log("Adding Branch");
            createNewBranchField();
        });


        $(document).on('click', '.bg-danger-subtle', function() {
            $(this).closest('.row').remove();
        });

        $('button[type="submit"]').on('click', function(event) {
            event.preventDefault();
            // Initialize an empty object to store form data
            let formData = {
                "variants": [],
                "experiment_name": $('input[name=experiment-name]').val()
            };

            // Traverse each input field within the form
            $(this).closest('form').find('.variant-row').each(function() {
                var variantName = $(this).find('.form-control').eq(0).val(); // Get the value of the first input field
                var targetingRatio = $(this).find('.form-control').eq(1).val(); // Get the value of the second input field

                // Create an object with the name and value of each input field
                var data = {
                    variantName: variantName,
                    targetingRatio: targetingRatio
                };

                // Add the object to the formData array
                formData.variants.push(data);
            });

            // Print the form data to the console (for demonstration)
            console.log(formData);
        });
    });
</script>

@endsection