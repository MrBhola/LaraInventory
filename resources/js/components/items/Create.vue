<template>
    <div class="card catd-body">
        <form @submit.prevent="createItem" class="bg-white p-4">
            <div class="form-group row">
                <label for="name">Item Name:</label>
                <div class="col-6">
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
            <div class="form-group">
                <label for="category">Category:</label>
                <div class="col-6">
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
                    <div class="col-6 d-flex align-items-center">
                        <input
                            v-model="row.value"
                            type="text"
                            class="form-control"
                            placeholder="Enter values"
                            :class="{ 'is-invalid': form.errors.has('rows.'+index+'.value') }"
                        >
                        <has-error :form="form" :field="'rows.'+index+'.value'"></has-error>

                        <div class="pl-2">
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
