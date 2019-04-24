<template>


    <div class="col-md-6">
			<div class="card" style="margin-top: 15px;">
			  <div class="card-header">
			    ADD NEW STUDENT
			  </div>
			  <div class="card-body">
			    <form>
				  <div class="form-group">
				    <label for="exampleInputEmail1">Name</label>
				    <input type="text" class="form-control" v-model="name" aria-describedby="emailHelp" placeholder="Enter Full Name" required>
				  </div>
				  <div class="form-group">
				    <label for="exampleInputEmail1">Varsity Id</label>
				    <input type="text" class="form-control" v-model="varsity_id" aria-describedby="emailHelp" placeholder="Enter Varsity Id" required>
				  </div>
				  <div class="form-group">
				    <label for="exampleInputEmail1">Department</label>
				    <input type="text" class="form-control" v-model="department" aria-describedby="emailHelp" placeholder="Enter Department" required>
				  </div>
				  <button type="submit" @click.prevent="saveData" class="btn btn-primary">Save</button>
				</form>
			  </div>
			</div>
		</div>


</template>


<script>

    export default {

        mounted() {
            console.log('Component mounted.');
        },

        data() {
            return {
                name:'',
                varsity_id:'',
                department:'',
            }
        },

        methods: {
            saveData() {
              let self = this;
                let data={
                    name: this.name,
                    varsity_id: this.varsity_id,
                    department: this.department,
                }
                axios.post('/save_data', data)
                .then(function (response) {
                    self.$root.$emit('saveData', data);
                })
                .catch(function (error) {
                    console.log(error);
                });  
            },
        },

    }

</script>