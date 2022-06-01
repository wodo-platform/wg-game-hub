<script >

</script>
<template>
  <input
   @change="eventHandler"
     :name="nameText"
     
   class="flex w-full px-4 py-2 placeholder-wgh-gray-3 font-normal text-sm text-wgh-gray-6 flex-none border border-wgh-gray-1 rounded outline-none pr-10 font-grota" />
</template>
<script>
export default {
  props: {
      onChange: {
        type: Function
      },
      nameText:{
        type: String
      },
    },
  methods:{
    eventHandler(e){
      this.onChange({value: e.target.value, name: this.nameText});
    }
  }
}
</script>
