@php
    $staffID = json_encode($staffID);
    $position = json_encode($position);
    $departments = json_encode($departments);
@endphp

<script>
    $(document).ready(function() {
        var staffID = {!! $staffID !!};
        var departments = {!! $departments !!};
        var position = {!! $position !!};
        console.table(departments);
        console.table(position);
        console.table(staffID);

        let departmentSelect = $('#department-select');
        let positionSelect = $('#position-select');

        departmentSelect.val('');
        positionSelect.val('');

        departmentSelect.change(function() {
        let deptId = $(this).val();
        positionSelect.empty();

        let filteredPositions = position.filter(function(value) {
            return value.dept_id == deptId;
        });

        if (filteredPositions.length === 0) {
            positionSelect.append('<option value="no_position">No positions available</option>');
        } else {
            $.each(filteredPositions, function(index, value) {
                positionSelect.append('<option value="' + value.id + '">' + value.position + '</option>');
            });
        }
    });
    });
</script>
