using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.SceneManagement;

public class CollissionCube : MonoBehaviour
{
    public GameObject thisSphere, nextSphere;
    public string collisionObject;
    // Start is called before the first frame update
    void Start()
    {
        
    }

    // Update is called once per frame
    void Update()
    {
        
    }

    void OnCollisionEnter(Collision collision)
    {
        //Output the Collider's GameObject's name
        Debug.Log(collision.collider.name);
        collisionObject = collision.collider.name;
        nextSphere.SetActive(true);
        thisSphere.SetActive(false);

        int score = PlayerPrefs.GetInt("elbowScore");
        score = score + 1;
        PlayerPrefs.SetInt("elbowScore", score);
    }
}
