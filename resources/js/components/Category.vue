<template>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Category List Table</h3>

                        <div class="card-tools">
                            <button class="btn btn-success" @click="createModal">
                                Add New
                                <i class="fas fa-layer-group"></i>
                                <i class="fas fa-plus-circle"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover table-striped">
                            <tbody>
                                <tr>
                                    <th>Category name</th>
                                    <th>Category ID</th>
                                    <th>Created at</th>
                                    <th>Updated at</th>
                                    <th class="text-right">Action</th>
                                </tr>
                                <tr v-for="category in categories" :key="category.id">
                                    <td>{{category.name | ucFirst}}</td>
                                    <td>{{category.id}}</td>
                                    <td>{{category.created_at | dFormat}}</td>
                                    <td>{{category.updated_at | dFormat}}</td>
                                    <td class="text-right">
                                        <a href="#" @click="editModal(category)">
                                            <i class="fa fa-edit green m-1"></i>
                                        </a>
                                        <a href="#" @click="deleteCategory(category.id)">
                                            <i class="fa fa-trash red m-1"></i>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- Modal -->
        <div
            class="modal fade"
            id="addNew"
            tabindex="-1"
            role="dialog"
            aria-labelledby="addNewLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 v-show="!editMode" class="modal-title" id="addNewLabel">Add New Category</h5>
                        <h5 v-show="editMode" class="modal-title" id="addNewLabel">Update Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form @submit.prevent=" editMode ? updateCategory() : createCategory()">
                        <div class="modal-body">
                            <div class="form-group">
                                <input
                                    v-model="form.name"
                                    type="text"
                                    name="name"
                                    class="form-control"
                                    placeholder="Enter category name"
                                    :class="{ 'is-invalid': form.errors.has('name') }"
                                >
                                <has-error :form="form" field="name"></has-error>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button v-show="editMode" type="submit" class="btn btn-primary">Update</button>
                            <button v-show="!editMode" type="submit" class="btn btn-success">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
// import { setInterval } from "timers";
export default {
    data() {
        return {
            editMode: false,
            categories: {},
            form: new Form({
                id: "",
                name: ""
            })
        };
    },
    methods: {
        createModal() {
            this.editMode = false;
            this.form.reset();
            this.form.clear();
            $("#addNew").modal("show");
        },
        editModal(category) {
            this.editMode = true;
            this.form.reset();
            this.form.clear();
            $("#addNew").modal("show");
            this.form.fill(category);
        },

        loadCategories() {
            this.$Progress.start();
            axios
                .get("api/category")
                .then(({ data }) => (this.categories = data.data));
            this.$Progress.finish();
        },

        createCategory() {
            this.$Progress.start();
            this.form
                .post("api/category")
                .then(() => {
                    $("#addNew").modal("hide");
                    Toast.fire({
                        type: "success",
                        title: "Category created successfully"
                    });
                    this.$Progress.finish();
                    this.loadCategories();
                })
                .catch();
        },
        updateCategory() {
            this.$Progress.start();
            this.form
                .put("api/category/" + this.form.id)
                .then(() => {
                    $("#addNew").modal("hide");
                    Swal.fire(
                        "Updated!",
                        "Your category has been updated successfully.",
                        "success"
                    );
                })
                .catch();
            this.$Progress.finish();
            this.loadCategories();
        },
        deleteCategory(id) {
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
                        .delete("api/category/" + id)
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
                this.loadCategories();
            });
        }
    },

    mounted() {
        console.log("Component mounted.");
    },
    created() {
        this.loadCategories();
        // setInterval(() => this.loadCategories(), 4000);
    }
};
</script>
