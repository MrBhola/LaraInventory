<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-5">
                <div class="card text-center">
                    <div class="card-header text-bold">
                        <h3>{{item.name}}</h3>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">
                            <span class="text-bold">Category :</span>
                            <span v-if="item.category">{{item.category.name}}</span>
                            <span v-else class="text-danger">May be deleted</span>
                        </h5>
                        <p
                            class="card-text"
                            v-for="property in JSON.parse(item.properties)"
                            :key="property.id"
                        >{{property.key}} : {{property.value}}</p>
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
                .get("/api/items/" + this.id)
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
