<template>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="card pt-2 pb-2">
                    <div class="card-header">
                        <h3 class="card-title mt-2">Items List Table</h3>
                        <div class="card-tools mt-2">
                            <router-link to="/items-create" class="btn btn-success">
                                Add New
                                <i class="fas fa-layer-group"></i>
                                <i class="fas fa-plus-circle"></i>
                            </router-link>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover table-striped">
                            <tbody>
                                <tr>
                                    <th>Item ID</th>
                                    <th>Item name</th>
                                    <th>Category</th>
                                    <th>Created at</th>
                                    <th>Updated at</th>
                                    <th class="text-right">Action</th>
                                </tr>
                                <tr v-for="item in items.data" :key="item.id">
                                    <td>{{item.id}}</td>
                                    <td>{{item.name | ucFirst}}</td>
                                    <td>{{item.category.name}}</td>
                                    <td>{{item.created_at | dFormat}}</td>
                                    <td>{{item.updated_at | dFormat}}</td>
                                    <td class="text-right">
                                        <a href="#">
                                            <i class="fa fa-eye blue m-1"></i>
                                        </a>
                                        <router-link :to="'items-edit/'+item.id">
                                            <i class="fa fa-edit green m-1"></i>
                                        </router-link>
                                        <a href="#" @click="deleteItem(item.id)">
                                            <i class="fa fa-trash red m-1"></i>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <pagination :data="items" @pagination-change-page="getResults"></pagination>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</template>

<script>
// import { setInterval } from "timers";
export default {
    data() {
        return {
            items: {},
            form: new Form({
                id: ""
            })
        };
    },
    methods: {
        getResults(page = 1) {
            axios
                .get("api/items?page=" + page)
                .then(response => {
                    this.items = response.data;
                })
                .catch(error => {
                    console.log(error.response.data.message);
                });
        },
        loadItems() {
            this.$Progress.start();
            axios
                .get("api/items")
                .then(({ data }) => (this.items = data))
                .catch(error => {
                    console.log(error.response.data.message);
                });
            this.$Progress.finish();
        },
        editItem(id) {
            this.$router.push({ name: "item", params: { id: id } });
        },
        deleteItem(id) {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then(result => {
                if (result.value) {
                    //Send delete req to controller
                    this.form
                        .delete("api/items/" + id)
                        .then(() => {
                            Swal.fire(
                                "Deleted!",
                                "Your file has been deleted.",
                                "success"
                            );
                        })
                        .catch(() => {
                            Swal(
                                "Failed!",
                                "There was something wrong.",
                                "warning"
                            );
                        });
                }
                this.loadItems();
            });
        }
    },

    mounted() {
        console.log("Component mounted.");
    },
    created() {
        this.loadItems();
    }
};
</script>
