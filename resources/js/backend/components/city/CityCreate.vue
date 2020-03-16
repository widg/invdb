<template>
<div class="panel panel-default">
    <div class="panel-body">
        <button v-on:click="visible=!visible" v-if="!visible" type="button" class="btn btn-outline-success">Добавить город</button>
        <div v-show="visible" >
            <div class="input-group">
                <input v-model="city.city" type="text" class="form-control" placeholder="Город" aria-label="Город" aria-describedby="basic-addon2">
                <input v-model="city.city_tr" type="text" class="form-control" placeholder="translate" aria-label="translate" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button v-on:click="addCity()" class="btn btn-outline-secondary" type="button">Добавить</button>
                    <button v-on:click="visible=!visible" class="btn btn-outline-secondary" type="button">Отмена</button>
                </div>
            </div>
        </div>
        <p></p>
        <table class="table table-striped table-bordered datatable dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info" style="border-collapse: collapse !important">

        <thead>
            <tr role="row">
                <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" style="width: 100px;">Город</th>
                <th class="sorting" tabindex="1" aria-controls="DataTables_Table_1" rowspan="1" colspan="1"  style="width: 100px;">Hostname</th>
                <th class="sorting" tabindex="2" aria-controls="DataTables_Table_2" rowspan="1" colspan="1"  style="width: 100px;">Type</th>
                <th class="sorting" tabindex="3" aria-controls="DataTables_Table_3" rowspan="1" colspan="1"  style="width: 100px;">Vlan</th>
                <th class="sorting" tabindex="4" aria-controls="DataTables_Table_4" rowspan="1" colspan="1"  style="width: 100px;">IP</th>
                <th class="sorting" tabindex="5" aria-controls="DataTables_Table_5" rowspan="1" colspan="1"  style="width: 100px;">DMVPN</th>
                <th class="sorting" tabindex="6" aria-controls="DataTables_Table_6" rowspan="1" colspan="1"  style="width: 100px;">Внешний IP</th>
                <th class="sorting" tabindex="7" aria-controls="DataTables_Table_7" rowspan="1" colspan="1"  style="width: 100px;">Комментарии</th>
            </tr>
        </thead>
        <tbody>

        <tr v-for="city, index in cities" role="row" class="odd">
            <td rowspan="1">{{ city.city }}</td>

                <th><button v-on:click="cisco.city_id = city.id" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" :data-whatever="[city.id, city.city]">Добавить оборудование</button></th>

            <td></td>
            <td><span class="badge badge-success"><a class="btn btn-success" href="#">Добавить vlan</a></span></td>

            <td></td>
            <td></td>
            <td></td>
            <td></td>

        </tr>

        </tbody>
        </table>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Новое оборудование</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                 <input v-model="cisco.city_id" class="form-control modal-recipient-id"  type="hidden" > 
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">hostname:</label>
                    <input v-model="cisco.hostname" type="text" class="form-control" id="name">
                </div>
                <div class="form-group">
                    <label for="name" class="col-form-label">type:</label>
                    <select v-model="cisco.type" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                        <option selected>Choose...</option>
                        <option value="router">Роутер</option>
                        <option value="switch">Свитч</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="name" class="col-form-label">dmvpn:</label>
                    <input v-model="cisco.dmvpn" type="text" class="form-control" id="name1">
                </div>
                <div class="form-group">
                    <label for="name" class="col-form-label">ip_external:</label>
                    <input v-model="cisco.ip_external" type="text" class="form-control" id="name2" minlength="7" maxlength="15" size="15" pattern="^((\d{1,2}|1\d\d|2[0-4]\d|25[0-5])\.){3}(\d{1,2}|1\d\d|2[0-4]\d|25[0-5])$">
                </div>
                <div class="form-group">
                    <label for="name" class="col-form-label">tpm_enable:</label>
                    <input v-model="cisco.tpm_enable" type="text" class="form-control" id="name3">
                </div>
                <div class="form-group">
                    <label for="name" class="col-form-label">tpm_radius_hm:</label>
                    <input v-model="cisco.tpm_radius_hm" type="text" class="form-control" id="name4">
                </div>
                <div class="form-group">
                    <label for="name" class="col-form-label">tpm_radius_dc:</label>
                    <input v-model="cisco.tpm_radius_dc" type="text" class="form-control" id="name5">
                </div>
                <div class="custom-control custom-switch">
                    <input v-model="cisco.status"  type="checkbox" class="custom-control-input" id="customSwitch1">
                    <label class="custom-control-label" for="customSwitch1">status</label>
                </div>
                
                <div class="form-group">
                    <label for="message-text" class="col-form-label">comment:</label>
                    <textarea v-model="cisco.comment" class="form-control" id="message-text"></textarea>
                </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button v-on:click="addCisco()" type="button" class="btn btn-primary">Send message</button>
            </div>
            </div>
        </div>
    </div>

</div>
</template>
<script>
    export default {
        data: function () {
            return {
                visible: false,
                cities: [],
                all: [],
                city_id: [],
                cisco: {
                    city_id: '',
                },
                city: {
                    city: '',
                    city_tr: '',
                }
            }
        },
        mounted() {
            var app = this;
            axios.get('/api/v1/city')
                .then(function (resp) {
                    app.cities = resp.data;
                })
                .catch(function (resp) {
                    console.log(resp);
                    alert("Could not load cities");
                });
            axios.get('/api/v1/all')
                .then(function (resp) {
                    app.all = resp.data;
                })
                .catch(function (resp) {
                    console.log(resp);
                    alert("Could not load cities");
                });
            $('#exampleModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget) // Button that triggered the modal
                var recipient = button.data('whatever') 
                var modal = $(this)
                var app = this;
                var comma = ',';
                let arr = recipient.split(comma);
                console.log(arr[0]);
                //app.cisco.city_id = arr[0];
                modal.find('.modal-title').text('Новое оборудование для ' + arr[1])
                modal.find('.modal-recipient-id').val(arr[0])
            })
        },
        methods: {
            addCity() {
                event.preventDefault();
                var app = this;
                var newCity = app.city;
                axios.post('/api/v1/city', newCity)
                    .then(function (resp) {
                        app.cities.push(resp.data);
                        app.city = {city: '', city_tr:''};
                    })
                    .catch(function (resp) {
                        console.log(resp);
                        alert("Could not create your city");
                    });
            },
            addCisco() {
                event.preventDefault();
                var app = this;
                var newCisco = app.cisco;
                axios.post('/api/v1/cisco', newCisco)
                    .then(function (resp) {
                        //app.cities.push(resp.data);
                        //app.city = {city: '', city_tr:''};
                    })
                    .catch(function (resp) {
                        console.log(resp);
                        alert("Could not create your city");
                    });
            },
        }
    }
</script>