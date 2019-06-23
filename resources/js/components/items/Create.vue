<template>
    <form @submit.prevent="createItem" class="bg-white p-4">
        <div class="form-group row">
            <label for="name">Item Name:</label>
            <div class="col-6">
                <input
                    v-model="form.itemName"
                    type="text"
                    class="form-control"
                    placeholder="Enter Item name :"
                >
            </div>
        </div>
        <div class="form-group">
            <label for="category">Category:</label>
            <div class="col-6">
                <select
                    v-model="form.category"
                    name="category"
                    class="form-control"
                    @change="loadCategories"
                >
                    <option>Select a Category</option>
                    <option
                        v-for="category in categories.data"
                        :key="category.id"
                        :value="category.id"
                    >@{{ category.name }}</option>
                </select>
            </div>
        </div>
        <div v-for="row in rows" :key="row.id">
            <div class="form-group row">
                <div class="col-6">
                    <input
                        name="keys[]"
                        type="text"
                        class="form-control"
                        placeholder="Enter attribute"
                    >
                </div>
                <div class="col-6 d-flex align-items-center">
                    <input
                        v-model="row.value"
                        name="values[]"
                        type="text"
                        class="form-control"
                        placeholder="Enter values"
                    >
                    <div class="pl-2">
                        <a href="#" @click.prevent="removeItem(row.id)">*</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <a @click.prevent="addForm" class="badge badge-secondary text-white">Add More</a>
        </div>
        <button type="submit" class="btn btn-primary float-right">Submit</button>
    </form>
</template>
<script>
export default {
    data() {
        return {
            categories: {},
            id: 0,
            rows: [{ id: 0, value: "" }],
            form: new Form({
                itemName: "",
                category: "",
                rows: [{ id: "", value: "" }]
            })
        };
    },
    methods: {
        loadCategories() {
            axios
                .get("api/category")
                .then(({ data }) => (this.categories = data))
                .catch(error => {
                    console.log(error.response.data.message);
                });
        },
        addForm: function() {
            this.id = this.id + 1;
            this.rows.push({ id: this.id, value: "" });
        },
        removeItem: function(key) {
            this.rows = this.rows.filter(e => e.id !== key);
        },
        createItem() {
            this.$Progress.start();
            this.form
                .post("api/items")
                .then(() => {
                    Toast.fire({
                        type: "success",
                        title: "Item created successfully"
                    });
                    this.$Progress.finish();
                })
                .catch(() => {
                    Swal("Failed!", "There was something wrong.", "warning");
                });
        }
    },
    mounted() {
        console.log("Component mounted.");
        this.loadCategories();
    }
};
</script>
