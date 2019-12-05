
package rdt3.pkg0;


import java.io.Serializable;
import java.util.Random;
import java.util.zip.CRC32;

/**
 *
 * @author standarduser
 */
public class packet  implements Serializable{
    
    String data;
    int packetNum, packetSeqNum;
    long checkSum;
    
    packet(){
        data="";
        packetNum=0;
        packetSeqNum=0;
        checkSum=0;
    }
    public String getData(){
        return data;
    }
    public void setData(String data){
        this.data=data;
    }
    public void assignData(){//sets the data
       Random rand = new Random();
        // Obtain a number between [0 - 9].
        int index = rand.nextInt(10);
        String data[] = {"data1","data2","data3","data3","data4","data5","data6","data7","data8","data9","data10"};
//        this.data=data;
        setData(data[index]);
        setCheckSum(calcCheckSum(data[index]));
        
    }
    
    public void setPacketNum(int packetNum){
        this.packetNum=packetNum;
    }
    
    public int getPacketNum(){
        return packetNum;
    }
    
    public void setPacketSeqNum(int packetSeqNum){
        this.packetSeqNum=packetSeqNum;
    }
    
    public int getPacketSeqNum(){
        return packetSeqNum;
    }
    
    public long calcCheckSum(String data){
        CRC32 crc = new CRC32();
        crc.update(data.getBytes());
        return crc.getValue();
    }
    
    public void setCheckSum(long checkSum){ 
        this.checkSum=checkSum;
    }
    
    public long getCheckSum(){ 
        return checkSum;
    }
    
    //public packet makepacket(int packetSeqNum){
        //assignData();
        //makeCheckSum();
        //setPacketSeqNum(packetSeqNum)
        //}

            
}
