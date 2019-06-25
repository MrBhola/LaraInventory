<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">I'm an example component.</div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    methods: {
        loadCategories() {
            this.$Progress.start();
            axios
                .get("api/category")
                .then(({ data }) => (this.categories = data))
                .catch(error => {
                    console.log(error.response.data.message);
                });
            this.$Progress.finish();
        },
        loadCategories() {
            this.$Progress.start();
            axios
                .get("api/category")
                .then(({ data }) => (this.categories = data))
                .catch(error => {
                    console.log(error.response.data.message);
                });
            this.$Progress.finish();
        }
    },
    mounted() {
        console.log("Component mounted.");
    }
};
</script>
