<template>

<div class="col-md-6">

  <div>
    <div class="card" style="margin-top: 15px;">
      <div class="card-header">
        ALL STUDENT LIST
      </div>
      <div class="card-body">
        <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Varsity Id</th>
            <th scope="col">Department</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>


          <tr v-for="(student,index) in students" :key="index">
            <th scope="row">{{ index+1 }}</th>
            <td ref="name">{{ student.name }}</td>
            <td ref="varsirty_id">{{ student.varsity_id }}</td>
            <td ref="department">{{ student.department }}</td>
            <td>

            <button class="btn btn-primary" @click.prevent="editData(student, index)" data-toggle="modal" data-target="#exampleModal">View</button>
                      
                      <a href="" @click.prevent="studentDelete(student.id,index)">
                  <button class="btn btn-danger">Delete</button> 
                      </a>  
            </td>

            
          </tr>

        </tbody>
      </table>
      </div>
    </div>
  </div>



<!--   MODAL FOR VIEW AND UPDATE DATA   -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">View and Update Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
        <input type="text" class="form-control" :value="currentStudent.name" aria-describedby="emailHelp" placeholder="Enter Name">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Varsity Id</label>
            <input type="text" class="form-control" :value="currentStudent.varsity_id" aria-describedby="emailHelp" placeholder="Enter Varsity Id">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Department</label>
            <input type="text" class="form-control" :value="currentStudent.department" aria-describedby="emailHelp" placeholder="Enter Department">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" @click="updateData(currentStudent)">Update</button>
          </div>
        </form>
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
                students:{},
                currentStudent: {
                  index: null,
                  id:'',
                  name: '',
                  varsity_id: '',
                  department: ''
                },

            };
        },
 
        created() {
          this.$root.$on('saveData', (data) => {
            this.updateData(data);
          });
        },
        mounted() {
            console.log('Component mounted.');
            this.getData();
        },
        methods: {
            getData() {
                axios.get('/view_allStudents')
                .then(response => {
                    this.students=response.data;
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
            },

            updateData: function(updatedData) {
              let student_count = this.students.length;
              this.$set(this.students, student_count, updatedData);
            },

            studentDelete(id, index) {
              let self= this;
              confirm('Are you sure want to delete this user?');
              axios.get('/delete/'+id, {
              })
              .then(function (response) {
                self.students.splice(index, 1);
              })
              .catch(function (error) {
                console.log(error);
              });
            },

            editData(student, index) {
              this.currentStudent.index = index
                      this.currentStudent.id = student.id
                      this.currentStudent.name = student.name
                      this.currentStudent.varsity_id= student.varsity_id
                      this.currentStudent.department= student.department
                
            },

            updateData() {
              let std = this.currentStudent;
              let i = std.index;

              this.$set(this.students, i, std);

                axios.post('/update_data/'+std.id, std)
                .then(function (response) {
                    // self.$root.$emit('saveData', data);
                })
                .catch(function (error) {
                    console.log(error);
                });

            },

        }
    }

</script>