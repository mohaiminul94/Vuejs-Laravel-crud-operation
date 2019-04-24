<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        I'm an example component.
                    </div>
                    <div v-for="post in posts" style="font-size:15px;">
                        {{ post.title }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                posts:{}
            }
        },
        mounted() {
            console.log('Component mounted.');
            this.getData();
        },
        methods: {
            getData() {
                axios.get('https://jsonplaceholder.typicode.com/posts')
                .then(response => {
                    this.posts=response.data;
                })
                .then(function (response) {
                    // handle success
                    console.log(response);
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                })
                .then(function () {
                    // always executed
                });
            }
        }
    }
</script>
