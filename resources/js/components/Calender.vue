<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <FullCalendar :options="calendarOptions" />
            </div>
        </div>
    </div>
</template>
<script>
    import FullCalendar from '@fullcalendar/vue'
    import dayGridPlugin from '@fullcalendar/daygrid'
    export default {
  components: {
    FullCalendar // make the <FullCalendar> tag available
  },
  data() {
    return {
      calendarOptions: {
        plugins: [ dayGridPlugin ],
        initialView: 'dayGridMonth',




        events:[

        	{ title: 'event 1', start: '23-07-2021 00:00:00',

        	end:'25-07-2021 00:00:00', backgroundColor:"blue" },

			{ title: 'event 1', start: '23-07-2021',end: '25-07-2021T00:00:00.000Z', backgroundColor:"red" }, { title: 'event 1', date: '05-08-2021', backgroundColor:"green" },
			{ title: 'event 1', date: '04-08-2021', backgroundColor:"black" }
		]
      }
    }
  }
}
</script>