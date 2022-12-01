using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class WristHandController : MonoBehaviour
{
    public GameObject collider1, collider2; 
    // Start is called before the first frame update
    void Start()
    {

    }

    // Update is called once per frame
    void Update()
    {
        
    }

    public void setHand(){
        hideColliders();
        collider2.SetActive(true);
    }

    void hideColliders(){
        collider1.SetActive(false);
        collider2.SetActive(false);
    }
}
