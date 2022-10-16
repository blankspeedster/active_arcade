using UnityEngine;
using System;
using System.Text;
using System.Net;
using System.Net.Sockets;
using System.Threading;

public class UDPReceive : MonoBehaviour
{
    Thread receiveThread;
    UdpClient client;
    public int port = 5052;
    public bool starReceiving = true;
    public bool printToConsole = true;
    public string data;
    // Start is called before the first frame update
    void Start()
    {
        receiveThread = new Thread(
            new ThreadStart(ReceiveData)
        );
        receiveThread.IsBackground = true;
        receiveThread.Start();
    }


    //receive thread
    private void ReceiveData(){
        client = new UdpClient(port);
        while(starReceiving)
        {
            try
            {
                IPEndPoint anyIP = new IPEndPoint(IPAddress.Any, 0);
                byte[] dataByte = client.Receive(ref anyIP);
                data = Encoding.UTF8.GetString(dataByte);

                if(printToConsole){print(data);}
            }
            catch(Exception err)
            {
                print(err.ToString());
            }
        }
    }
}
