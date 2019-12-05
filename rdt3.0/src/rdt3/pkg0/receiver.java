
package rdt3.pkg0;
/*
Submitted By:
Abdul Mannan:       16k-3620
Murtaza Multanwala: 16k-3618
*/
import java.io.*; 
import java.net.*; 

class receiver
{
    public static void main(String[] args) throws IOException, ClassNotFoundException, InterruptedException {
      
        
        System.out.println("Receiver");
        Socket s=new Socket("localHost",8000);
        
        //object streams for packet sending & receiving
        ObjectOutputStream clientOutputStream = new ObjectOutputStream(s.getOutputStream());
      
        
        int seqNum=0, seqRcv=0;
        packet pkRec = null;
        
        for(int i=0;i<15;i++)
        {
              ObjectInputStream clientInputStream = new ObjectInputStream(s.getInputStream());
            
            System.out.println("***********************"+(i+1));
            //receive message
           
            pkRec=(packet)clientInputStream.readObject();
            seqRcv = pkRec.getPacketSeqNum();
            seqNum=pkRec.getPacketSeqNum();
            System.out.println("Packet-"+pkRec.getPacketNum()+" with data "+pkRec.getData()+" received");
            
            //corrupt logic**************
            if(pkRec.getCheckSum()!=pkRec.calcCheckSum(pkRec.getData())){
                System.out.println(pkRec.getPacketNum()+" Corrupted");
                if(seqRcv == 0)seqNum=1; // If packet is corrupted send the sequence no. of the previous packet
                else seqNum = 0;
            } 
            else System.out.println("Not Corrupted");
          
            
             //send message
             packet pkSend=new packet();
             pkSend.setData(pkRec.getPacketNum() +" acknowledged"+" SeqNum: "+seqNum);
             pkSend.setPacketSeqNum(seqNum);
             
             //packet sent
             clientOutputStream.writeObject(pkSend);
             clientOutputStream.flush();
            System.out.println("***********************\n");
            
            
        }
     
           
            
    }
}
