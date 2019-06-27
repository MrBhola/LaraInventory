<template>
    <div class="mt-5">
        <div class="card catd-body">
            <div class="card pt-6 pb-2">
                <div class="card-header">
                    <div class="d-flex justify-content-inline">
                        <h3 class="card-title mt-2">You are creatting new item : {{form.name}}</h3>
                    </div>
                    <div class="card-tools mt-2">
                        <router-link to="/items" class="btn btn-success">
                            <i class="fas fa-list"></i>
                            List Item
                        </router-link>
                    </div>
                </div>
            </div>
            <form @submit.prevent="createItem" class="bg-white p-4">
                <div class="form-group row">
                    <div class="col-6">
                        <label for="name">Item Name :</label>
                        <input
                            v-model="form.name"
                            type="text"
                            class="form-control"
                            placeholder="Enter Item name :"
                            :class="{ 'is-invalid': form.errors.has('name') }"
                        >
                        <has-error :form="form" field="name"></has-error>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-6">
                        <label for="category">Category :</label>
                        <select
                            v-model="form.category_id"
                            name="category"
                            class="form-control"
                            :class="{ 'is-invalid': form.errors.has('category_id') }"
                        >
                            <option value="null" disabled>Select a Category</option>
                            <option
                                v-for="category in categories"
                                :key="category.id"
                                :value="category.id"
                            >{{ category.name }}</option>
                        </select>
                        <has-error :form="form" field="category_id"></has-error>
                    </div>
                </div>
                <div class="w-100 row">
                    <label class="col-6 text-bold">Attribute Name :</label>
                    <label class="col-6 pl-5 text-bold">Attribute Value :</label>
                </div>

                <div v-for="(row,index) in form.rows" :key="row.id">
                    <div class="form-group row">
                        <div class="col-6">
                            <input
                                v-model="row.key"
                                type="text"
                                class="form-control"
                                placeholder="Enter attribute"
                                :class="{ 'is-invalid': form.errors.has('rows.'+index+'.key') }"
                            >
                            <has-error :form="form" :field="'rows.'+index+'.key'"></has-error>
                        </div>
                        <div class="col-6 d-flex">
                            <div class="col-10">
                                <input
                                    v-model="row.value"
                                    type="text"
                                    class="form-control"
                                    placeholder="Enter values"
                                    :class="{ 'is-invalid': form.errors.has('rows.'+index+'.value') }"
                                >
                                <has-error :form="form" :field="'rows.'+index+'.value'"></has-error>
                            </div>

                            <div class="pl-2 mt-2">
                                <a href="#" @click.prevent="removeItem(row.id)">
                                    <i class="fas fa-minus-circle fa-lg red"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <a @click.prevent="addForm" class="btn bnt-lg btn-outline-success">
                        Add More
                        <i class="fas fa-plus-circle fa-lg blue"></i>
                    </a>
                </div>
                <button type="submit" class="btn btn-primary float-right">Submit</button>
            </form>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            categories: {},
            id: 0,
            form: new Form({
                name: "",
                category_id: "null",
                rows: [{ id: 0, key: "", value: "" }]
            })
        };
    },
    methods: {
        loadCategories() {
            axios
                .get("/api/category/1")
                .then(({ data }) => (this.categories = data))
                .catch(error => {
                    console.log(error.response.data.message);
                });
        },
        addForm: function() {
            this.id = this.id + 1;
            this.form.rows.push({ id: this.id, key: "", value: "" });
        },
        removeItem: function(key) {
            this.form.rows = this.form.rows.filter(e => e.id !== key);
        },
        createItem() {
            this.$Progress.start();
            this.form
                .post("/api/items")
                .then(() => {
                    Toast.fire({
                        type: "success",
                        title: "Item created successfully"
                    });
                    this.$Progress.finish();
                })
                .catch(() => {});
        }
    },
    mounted() {
        console.log("Component mounted.");
        this.loadCategories();
    }
};
</script>
