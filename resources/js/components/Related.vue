<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-5">
                <div class="card text-center">
                    <div class="card-header text-bold">
                        <!-- <h3>{{category.name}}</h3> -->
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">
                            <span class="text-bold">Items related to this category :</span>
                        </h5>
                        <!-- <ul class="card-text" v-for="item in items" :key="item.id">
                            <li>{{item.name}}</li>
                        </ul>-->
                        <router-link :to="'/items-edit/'+item.id" class="btn btn-primary">Edit Item</router-link>
                    </div>
                    <div class="card-footer text-muted">{{item.created_at | dFormat}}</div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ["id"],
    data() {
        return {
            item: {}
        };
    },
    methods: {
        loadItem() {
            axios
                .get("/api/related/" + this.id)
                .then(({ data }) => (this.item = data))
                .catch(error => {
                    console.log(error);
                });
        }
    },
    mounted() {
        this.loadItem();
        console.log("Component mounted.");
    }
};
</script>
