<template>
    <div class="row"><div class="col-sm-12">
        <table class="table table-striped table-bordered datatable dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info" style="border-collapse: collapse !important">

        <thead>
            <tr role="row">
                <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Username: activate to sort column descending" style="width: 370px;">Username</th>
                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Date registered: activate to sort column ascending" style="width: 320px;">Date registered</th>
                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Role: activate to sort column ascending" style="width: 153px;">Role</th>
                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 168px;">Status</th>
                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending" style="width: 320px;">Actions</th>
            </tr>
        </thead>
        <tbody>

        <tr v-for="city, index in cities" role="row" class="odd">
            <td class="sorting_1">{{ city.name }}</td>
            <td>{{ city.name }}</td>
            <td>{{ city.name }}</td>
            <td><span class="badge badge-success">{{ city.name }}</span></td>

            <td>
                <a class="btn btn-success" href="#"></a>
            </td>
        </tr>

        </tbody>
        </table>
        </div>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                cities: []
            }
        },
        mounted() {
            var app = this;
            axios.get('/api/v1/cities')
                .then(function (resp) {
                    app.cities = resp.data;
                })
                .catch(function (resp) {
                    console.log(resp);
                    alert("Could not load cities");
                });
        },
        methods: {
            deleteEntry(id, index) {
                if (confirm("Do you really want to delete it?")) {
                    var app = this;
                    axios.delete('/api/v1/cities/' + id)
                        .then(function (resp) {
                            app.cities.splice(index, 1);
                        })
                        .catch(function (resp) {
                            alert("Could not delete city");
                        });
                }
            }
        }
    }
</script>
