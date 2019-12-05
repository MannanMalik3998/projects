
package rdt3.pkg0;
/*
Submitted By:
Abdul Mannan:       16k-3620
Murtaza Multanwala: 16k-3618
*/
import java.io.*; 
import java.net.*; 

class sender{
    public static void send() throws IOException, ClassNotFoundException, InterruptedException{
    
       boolean corrupt=false; 
    System.out.println("Sender");
        // TODO code application logic here
        ServerSocket ss= new ServerSocket(8000);
        Socket s=ss.accept();//waiting for client
       
        //object streams for packet sending & receiving

       
        ObjectInputStream serverInputStream = new ObjectInputStream(s.getInputStream());
       
        int packNum=1;
        int seqNum=0, prevSeqNum=1;
        boolean original=true;
        packet pkSend = null;
        
        for(int i=0;i<15;i++)
//        while(true)
        {
             ObjectOutputStream serverOutputStream = new ObjectOutputStream(s.getOutputStream());
            
            System.out.println("*****************"+(i+1));
            //Message Sending 
            if(original){
                pkSend = new packet();
                pkSend.assignData();
                pkSend.setPacketNum(packNum);
                pkSend.setPacketSeqNum(seqNum);
                pkSend.setData(pkSend.getData()+"c");corrupt=true;//corrupt packet
            }
            
            //data sending
            System.out.println("Sending Packet: "+pkSend.getPacketNum()+" with data: "+pkSend.getData());
            serverOutputStream.writeObject(pkSend);
            
            serverOutputStream.flush();
//          
            if(corrupt){
                pkSend.setData(pkSend.getData().substring(0, pkSend.getData().length()-1));//decorrupt packet
                corrupt=false;
            }
            
            //Message Receiving
            packet pkRec = new packet();
            pkRec=(packet)serverInputStream.readObject();
            
            if(pkRec.getPacketSeqNum()==pkSend.getPacketSeqNum()){
                //ack
                System.out.println("Ack Received");
                original=true;
                packNum++;
                prevSeqNum=seqNum;
                seqNum=seqNum^1;
            }
            else{
              //nak
                System.out.println("Nak");
                original=false;

               
            }
            System.out.println(pkRec.getData());
           
           
           System.out.println("*****************\n");
        }
        
        ss.close();
    }
    
    public static void main(String[] args) throws IOException, ClassNotFoundException, InterruptedException {
        send();
    }
}