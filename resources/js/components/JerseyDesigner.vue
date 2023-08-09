<template>
    <div class="jersey-designer">
      <div class="row">
        <div class="col-sm-6">
            <div :style="`background-image: url(${photo})`" class="jersey__designer">
               <div class="relative">
                <svg class="curved-text-svg">
                <text :x="curve.centerX" :y="curve.centerY" :dy="dy" class="curved-text">
                    {{ textHolder }}
                </text>
                </svg>

                <span class="Number__holder">{{ numberHolder }}</span>
               </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="d-block">
               <div class="card card-body">
                <button class="btn btn-primary btn-lg text-white" @click.prevent="selectPersonaType('personal')" id="persona__personal">Add your own name and number (Make it Personal)</button>
                    <div class="lead p-3 text-center">or</div>
                <button class="btn btn-secondary btn-lg" @click.prevent="selectPersonaType('player')" id="persona__player">Select Player (Pick a squad player)</button>

                <div class="mt-3" v-if="personalisationType ==='personal'">
                    <h4>Enter personalisation (optional)</h4>
                    <p>Add a name or number to personalise your item or to create the perfect gift!</p>
                    <div class="row">
                        <div class="col-7">
                            <div class="mb-3">
                                <label for="personalise__name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="personalise__name" aria-describedby="namehelp" v-model="textHolder">
                                <div id="namehelp" class="form-text">We will print this name on this jersey</div>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="mb-3">
                                <label for="personalise__number" class="form-label">Number</label>
                                <input type="text" class="form-control" id="personalise__number" aria-describedby="numberhelp" v-model="numberHolder">
                                <div id="numberhelp" class="form-text">We will print this number on this jersey</div>
                            </div>
                        </div>
                    </div>
                </div>
               </div>
            </div>
        </div>
      </div>
    </div>
  </template>

  <script setup>
  import { ref, onMounted, watch } from 'vue';
  import NameBadgeForm from './NameBadgeForm.vue';



  const props = defineProps({
    product:Object
  })
  const photo = ref(null);
  const textHolder = ref(null);
  const numberHolder = ref(null);
onMounted(() => {
    photo.value = props.product.artisticImage;
    calculatePosition();
    window.addEventListener('resize', calculatePosition);
})
const personalisationType = ref(null)
const selectPersonaType = (pType)=> {
    if(pType ==='personal') {
        personalisationType.value = 'personal'
    } else if(pType ==='player'){
        personalisationType.value = 'player'
    } else {
        personalisationType.value = null
    }
}
const text = ref('Curved Text');
  const radius = ref(100); // Radius of the curve
  const curve = ref({ centerX: 0, centerY: 0 });
  const dy = ref('.35em');
  const calculatePosition = () => {
    curve.centerX = window.innerWidth / 2;
    curve.centerY = window.innerHeight / 2;
  };


  // Other setup logic if needed
  </script>

  <style scoped>
  .jersey-designer {
    position: relative;
  }
  path {
  fill: transparent;
}

text {
  fill: #FF9800;
}
  </style>
