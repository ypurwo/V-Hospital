<template>
  <div>
      <div class="card">
          <div class="card-header"><h6>Select Date For Your Booking Appointment</h6></div>
          <div class="card-body">
              <datepicker class="my-datepicker" calendar-class="my-datepicker_calendar"
                :format="customDate"
                v-model="time"
                :inline=true
                :disabledDates="disabledDates"
                >
              </datepicker>
          </div>
      </div>
    <!-- {{time}}
    {{doctors}} -->
      <div class="card">
          <div class="card-header">Doctors Available for {{time}}</div>
          <div class="card-body">
              <table class="table table-striped">
                  <thead>
                      <tr>
                          <th>#</th>
                          <th>Avatar</th>
                          <th>Name</th>
                          <th>Specialist</th>
                          <th>Date</th>
                          <th>Booking</th>
                      </tr>
                  </thead>
                  <tbody>
                        <tr class="single-member" v-for='(d,doctor) in doctors' :key='doctor.id'>
                          <td>{{doctor+1}}</td>
                          <td>
                              <img :src="'/images/'+ d.doctor.image" width="80" style="border-radius: 50%">
                          </td>
                          <td>{{d.doctor.name}}</td>
                          <td>{{d.doctor.department}}</td>
                          <td>{{d.date}}</td>
                          <td>
                              <a :href="'/new-appointment/'+d.user_id+'/'+d.date "><button class="btn btn-success"><i class="ik ik-eye"></i>Book Appointment</button></a>
                          </td>
                        </tr>
                        <td v-if="doctors.length==0">No Doctors Available for {{this.time}}</td>
                  </tbody>
              </table>
              <div class="pulse-loader">
                  <pulse-loader :loading="loading" :color="color" :size="size"></pulse-loader>
              </div>
          </div>
      </div>
  </div>
</template>

<script type="text/javascript">
    import datepicker from 'vuejs-datepicker';
    import moment from 'moment';
    import PulseLoader from 'vue-spinner/src/PacmanLoader.vue';

    export default {
        data(){
            return{
                time:'',
                id: 'id',
                doctors:[],
                loading:false, //function untuk menampilkan loading
                disabledDates:{
                    to:new Date(Date.now() - 86400000)
                }
            }
        },
        components:{
            datepicker,
            PulseLoader
        },
        methods:{
            customDate(date){
                //panggil loding pada saat tanggal di click
                this.loading=true

                this.time = moment(date).format('DD-MM-YYYY');
                axios.post('/api/finddoctors',{date:this.time})
                .then((response)=>{
                    setTimeout(()=>{
                        this.doctors = response.data
                        //Stop Loading jika respon data selesai
                        this.loading=false
                        },1000)
                })
            }
        },
        mounted(){
            this.loading=true
            axios.get('/api/doctors/today').then((response)=>{
                this.doctors = response.data
                this.loading=false
            })
        }

    }
</script>

<style scoped>
    .my-datepicker >>> .my-datepicker_calendar{
        width: 100%;
        height: 330px;
    }

</style>


