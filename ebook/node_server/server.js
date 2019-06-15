var io = require('socket.io')(6002)
console.log('Connected to port 6002')

//ket noi that bai server node
io.on('error',function(){
	console.log('error')
})
//ket noi thanh cong den server node
io.on('connection',function(socket){
	console.log('da ket noi id cua ban '+socket.id)
})
var Redis = require('ioredis')
var redis = new Redis(1000) // port to redis

redis.psubscribe("*",function(error,count){
	//
})

//lang nghe su kien
redis.on('pmessage',function(partner,channel,message){
	console.log(partner)
	console.log(channel)
	console.log(message)

	message = JSON.parse(message)
	io.emit('chat:message',message.data.message)
	console.log('sent');
})