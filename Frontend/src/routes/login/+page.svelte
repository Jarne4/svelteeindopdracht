<script>

let email = ""
let password = ""
let error = ""

async function login(){

const res = await fetch("http://localhost:8000/api/login",{
method:"POST",
headers:{
"Content-Type":"application/json"
},
body:JSON.stringify({email,password})
})

if(res.ok){

const data = await res.json()

localStorage.setItem("loggedIn","true")
localStorage.setItem("role", data.role)
localStorage.setItem("userEmail", data.email)

if(data.role === "admin"){
window.location.href="/admin"
}else{
window.location.href="/afspraken"
}

}else{

error="Login mislukt"

}

}

</script>

<div class="max-w-md mx-auto mt-12 p-6 bg-white rounded shadow">
  <h1 class="text-2xl font-bold mb-4">Login</h1>
  <input bind:value={email} placeholder="Email" class="border p-2 w-full mb-2 rounded"/>
  <input bind:value={password} type="password" placeholder="Wachtwoord" class="border p-2 w-full mb-4 rounded"/>
  <button on:click={login} class="bg-blue-500 text-white px-4 py-2 rounded w-full">Login</button>
  <p class="mt-2 text-red-500">{error}</p>
</div>