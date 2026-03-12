<script>

import { goto } from "$app/navigation"

let name=""
let email=""
let password=""
let message=""

async function register(){

const res = await fetch("http://localhost:8000/api/register",{

method:"POST",
headers:{
"Content-Type":"application/json"
},

body:JSON.stringify({
name,
email,
password
})

})

if(res.ok){

message="Account aangemaakt"
goto("/login")

}else{

message="Registratie mislukt"

}

}

</script>

<div class="max-w-md mx-auto mt-12 p-6 bg-white rounded shadow">
  <h1 class="text-2xl font-bold mb-4">Account Registreren</h1>
  <input bind:value={name} placeholder="Naam" class="border p-2 w-full mb-2 rounded"/>
  <input bind:value={email} placeholder="Email" class="border p-2 w-full mb-2 rounded"/>
  <input bind:value={password} type="password" placeholder="Wachtwoord" class="border p-2 w-full mb-4 rounded"/>
  <button on:click={register} class="bg-green-500 text-white px-4 py-2 rounded w-full">Register</button>
  <p class="mt-2 text-red-500">{message}</p>
</div>